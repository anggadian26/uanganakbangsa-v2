<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexSiswa()
    {
        return view('home.index_siswa'); 
    }
}
