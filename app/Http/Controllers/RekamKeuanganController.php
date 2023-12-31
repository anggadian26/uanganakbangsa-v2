<?php

namespace App\Http\Controllers;

use App\Models\SaldoModel;
use App\Models\TabunganModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamKeuanganController extends Controller
{

    public function index(Request $request)
    {
        $tanggal = $request->tanggal;
        $name = $request->name;
        $angkatan = $request->angkatan;

        $query = TabunganModel::query()
            ->select('A.*', 'B.name', 'B.jurusan_id', 'B.angkatan', 'C.jurusan_name')
            ->from('tabungan AS A')
            ->join('users AS B', 'A.user_id', '=', 'B.id')
            ->join('jurusan AS C', 'B.jurusan_id', '=', 'C.jurusan_id')
            ->when($tanggal, function ($query, $tanggal) {
                return $query->where('A.tanggal', $tanggal);
            })
            ->when($name, function ($query, $name) {
                return $query->where('B.name', 'like', '%' . $name . '%');
            })
            ->when($angkatan, function ($query, $angkatan) {
                return $query->where('B.angkatan', $angkatan);
            })
            ->orderBy('B.angkatan', 'asc')
            ->orderBy('A.tanggal', 'asc')
            ->orderBy('B.name', 'asc');

        $tabungan = $query->paginate(100);

        foreach ($tabungan as $item) {
            $record_id = $item->record_id;

            $queryRecord = "
                SELECT name
                FROM users
                WHERE id = $record_id
            ";

            $record_name = DB::select($queryRecord);
            $record_name = count($record_name) > 0 ? $record_name[0]->name : null;

            $item->record_name = $record_name;
        }

        $queryCount = "
            SELECT COUNT(1) AS totalData
            FROM tabungan
        ";
        $total = DB::select($queryCount);

        return view('rekam-keuangan.index', compact('tabungan', 'total'));
    }

    public function delete($id)
    {
        $tabungan = TabunganModel::find($id);

        $keluar = $tabungan->penarikan;
        $masuk = $tabungan->pemasukkan;
        $user_id = $tabungan->user_id;

        $saldoModel = SaldoModel::where('user_id', $user_id)->first();
        $saldo = $saldoModel->saldo_amount;

        // kondisi data penarikkan yang dihapus
        if($keluar != null) {
            $resultDeleteKeluar = $saldo + $keluar;

            $updateKeluar = [
                'saldo_amount'  => $resultDeleteKeluar,
                'update'        => Carbon::now()
            ];

            SaldoModel::where('user_id', $user_id)->update($updateKeluar);
            $tabungan->delete();
        }

        // Kondisi data pemasukkan yang dihapus
        if($masuk != null) {
            $resultMasukKeluar = $saldo - $masuk;

            $updateMasuk = [
                'saldo_amount'  => $resultMasukKeluar,
                'update'        => Carbon::now()
            ];

            SaldoModel::where('user_id', $user_id)->update($updateMasuk);
            $tabungan->delete();
        }

        return redirect()->route('indexRekamKeuangan')->with('toast_success', 'Data has been deleted successfully.');
    }
}
