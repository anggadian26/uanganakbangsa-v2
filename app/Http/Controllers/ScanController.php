<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScanController extends Controller
{
    public function showScan()
    {
        return view('auth.barcode-page');
    }

    public function validasiqrcode(Request $request)
    {
        $qrCodeValue = $request->qr_code;

        $user = User::where('barcode', $qrCodeValue)->first();
    
        if ($user) {
            Auth::login($user);
            return response()->json(['status' => 200, 'message' => 'Login berhasil']);
        }
    
        return response()->json(['status' => 401, 'message' => 'Barcode tidak valid']);
    }
}
