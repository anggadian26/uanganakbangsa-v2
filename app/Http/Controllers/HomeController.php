<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function indexSiswa()
    {
        $user_id = Auth::id();

        $query = "
            SELECT *
            FROM saldo
            WHERE user_id = $user_id
        ";
        $saldo = DB::select($query);

        $queryPemasukkan = "
            SELECT *
            FROM tabungan
            WHERE user_id = $user_id
            AND jenis = 'M'
            ORDER BY updated_at DESC
            LIMIT 1
        ";

        $pemasukkan = DB::select($queryPemasukkan);

        $queryPengeluran = "
            SELECT *
            FROM tabungan
            WHERE user_id = $user_id
            AND jenis = 'K'
            ORDER BY updated_at DESC
            LIMIT 1
        ";

        $pengeluaran = DB::select($queryPengeluran);
        return view('home.index_siswa', compact(['saldo', 'pemasukkan', 'pengeluaran']));
    }
}
