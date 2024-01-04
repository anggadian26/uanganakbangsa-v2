<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasukSaldoController extends Controller
{
    public function index()
    {
        return view('masuk-saldo.index');
    }
}
