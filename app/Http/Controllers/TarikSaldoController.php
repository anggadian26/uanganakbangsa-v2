<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarikSaldoController extends Controller
{
    public function indexSiswa() {
        return view('tarik-saldo.index_siswa');
    }
}
