<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index() {
        $total_saldo = DB::table('saldo')->sum('saldo_amount');

        $currentMonth = now()->format('m');

        $totalPenarikan = DB::table('tabungan')
            ->whereMonth('tanggal', $currentMonth)
            ->sum('penarikan');
        // dd($totalPenarikan);
        $totalPemasukkan = DB::table('tabungan')
            ->whereMonth('tanggal', $currentMonth)
            ->sum('pemasukkan');
        return view('home.index_admin', compact(['total_saldo', 'totalPenarikan', 'totalPemasukkan']));
    }
}
