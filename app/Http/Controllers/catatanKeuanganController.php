<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class catatanKeuanganController extends Controller
{
    public function index() {
        return view('catatan-keuangan.index');
    }
}
