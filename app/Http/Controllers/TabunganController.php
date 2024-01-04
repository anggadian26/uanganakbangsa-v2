<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use App\Models\SaldoModel;
use App\Models\TabunganModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

date_default_timezone_set("Asia/Jakarta");

class TabunganController extends Controller
{
    public function indexSiswa(Request $request)
    {
        $tanggal = $request->tanggal;

        $user_id = Auth::id();
        $query = TabunganModel::query()
            ->from('tabungan')
            ->where('user_id', '=', $user_id)
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('tanggal', $tanggal);
            })
            ->orderBy('tanggal', 'asc');

        $tabungan = $query->paginate(50);

        $queryCount = "
            SELECT COUNT(1) AS totalData
            FROM users A
            INNER JOIN role B ON A.role_id = B.role_id
            WHERE B.role = 'siswa'
        ";
        $total = DB::select($queryCount);

        $query = "
            SELECT *
            FROM saldo
            WHERE user_id = $user_id
        ";

        $saldo = DB::select($query);

        return view('tabungan.siswa.index', compact('tabungan', 'total', 'saldo'));
    }


    public function indexAdmin(Request $request)
    {
        $queryJurusan = "
            SELECT jurusan_id, jurusan_code, jurusan_name
            FROM jurusan
            ORDER BY jurusan_name ASC
        ";
        $jurusan = DB::select($queryJurusan);

        $name = $request->name;
        $angkatan = $request->angkatan;
        $jurusan_id  = $request->jurusan_id;

        $query = User::query()
            ->select('A.*', 'B.jurusan_name', 'B.jurusan_code', 'C.role', 'D.*')
            ->from('users AS A')
            ->join('jurusan AS B', 'A.jurusan_id', '=', 'B.jurusan_id')
            ->join('role AS C', 'A.role_id', '=', 'C.role_id')
            ->join('saldo AS D', 'A.id', '=', 'D.user_id')
            ->where('C.role', '=', 'siswa')
            ->when($name, function ($query, $name) {
                return $query->where('A.name', 'like', '%' . $name . '%');
            })
            ->when($angkatan, function ($query, $angkatan) {
                return $query->where('A.angkatan', $angkatan);
            })
            ->when($jurusan_id, function ($query, $jurusan_id) {
                return $query->where('A.jurusan_id', $jurusan_id);
            })
            ->orderBy('A.angkatan', 'ASC')
            ->orderBy('A.jurusan_id', 'ASC')
            ->orderBy('A.name', 'ASC');

        $siswa = $query->paginate(50);

        // dd($siswa);

        $queryCount = "
            SELECT COUNT(1) AS totalData
            FROM users A
            INNER JOIN role B ON A.role_id = B.role_id
            WHERE B.role = 'siswa'
        ";
        $total = DB::select($queryCount);

        return view('tabungan.admin.index', compact(['jurusan', 'siswa', 'total']));
    }

    public function penarikanAdmin(Request $request)
    {
        if ($request->penarikan == null || $request->penarikan == 0) {
            return redirect()->route('tabungan-admin')->with('toast_error', 'Saldo gagal ditarik!');
        }

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
            'user_id'       => $request->user_id,
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

        SaldoModel::where('user_id', $request->user_id)->update($saldo);

        return redirect()->route('tabungan-admin')->with('toast_success', 'Saldo berhasil ditarik!');
    }

    public function pemasukkanAdmin(Request $request)
    {
        if ($request->pemasukkan == null || $request->pemasukkan == 0) {
            return redirect()->route('tabungan-admin')->with('toast_error', 'Saldo gagal ditambahkan!');
        }

        $validate = $request->validate([
            'pemasukkan' => 'required',
            'keterangan' => 'nullable'
        ]);

        $saldo_awal = $request->saldo_awal;
        $validate_pemasukkan = $validate['pemasukkan'];
        $result_pemasukkan = $saldo_awal + $validate_pemasukkan;
        $record_id = Auth::id();
        $tanggal = Carbon::now()->toDateString();

        $tabungan = [
            'user_id'       => $request->user_id,
            'pemasukkan'     => $validate_pemasukkan,
            'jenis'         => 'M',
            'tanggal'       => $tanggal,
            'jumlah_sisa'   => $result_pemasukkan,
            'keterangan'    => $request->keterangan,
            'record_id'     => $record_id
        ];

        TabunganModel::create($tabungan);

        $saldo = [
            'saldo_amount'  => $result_pemasukkan,
            'update'        => Carbon::now()
        ];

        SaldoModel::where('user_id', $request->user_id)->update($saldo);

        return redirect()->route('tabungan-admin')->with('toast_success', 'Saldo berhasil ditambah!');
    }
}
