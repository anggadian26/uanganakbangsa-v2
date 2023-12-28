<?php

namespace App\Http\Controllers;

use App\Models\SaldoModel;
use App\Models\TabunganModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TarikSaldoController extends Controller
{
    public function indexSiswa() {
        $user_id = Auth::id();

        $query = "
            SELECT *
            FROM saldo
            WHERE user_id = $user_id
        ";

        $saldo = DB::select($query);

        return view('tarik-saldo.index_siswa', compact(['saldo']));
    }

    public function tarikSaldoSiswa(Request $request)
    {
        $validate = $request->validate([
            'penarikan' => 'required',
            'keterangan' => 'nullable'
        ]);

        $saldo_awal = $request->saldo_awal;
        $validate_penarikan = $validate['penarikan'];
        $result_penarikan = $saldo_awal - $validate_penarikan;
        $record_id = Auth::id();
        $tanggal = Carbon::now()->toDateString();

        $tabungan = [
            'user_id'       => $record_id,
            'penarikan'     => $validate_penarikan,
            'jenis'         => 'K',
            'tanggal'       => $tanggal,
            'jumlah_sisa'   => $result_penarikan,
            'keterangan'    => $request->keterangan,
            'record_id'     => $record_id
        ];

        TabunganModel::create($tabungan);

        $saldo = [
            'saldo_amount'  => $result_penarikan,
            'update'        => Carbon::now()
        ];

        SaldoModel::where('user_id', $record_id)->update($saldo);

        return redirect()->route('success', ['penarikan' => $validate_penarikan])->with('toast_success', 'Saldo berhasil ditarik!');
    }

    public function successPage(Request $request) {
        $penarikan = $request->input('penarikan');
        return view('tarik-saldo.success', compact('penarikan'));
    }
    
}
