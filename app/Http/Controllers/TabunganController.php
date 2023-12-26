<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabunganController extends Controller
{
    public function indexSiswa() {
        return view('tabungan.index-siswa');
    }

}
