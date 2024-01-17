<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pinUserController extends Controller
{
    public function index() 
    {
        return view("auth.pinPageSiswa");
    }

    public function pincodeAction(Request $request)
    {
        $request->validate([
            'pincode' => 'required|digits:4',
        ]);

        $pincode = $request->input('pincode');

        if (Auth::check() && Auth::user()->pin == $pincode) {
            return response()->json(['message' => 'PIN benar.'], 200);
        } else {
            return response()->json(['error' => 'PIN salah.'], 401);
        }
    }
}
