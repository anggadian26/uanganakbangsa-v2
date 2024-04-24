<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CetakBarcodeController extends Controller
{
    public function index() {
        return view("cetak-barcode.index");
    }

    public function cetakBarcode(Request $request) 
    {
        $val = $request->validate([
            "angkatan" => "required",
        ]);
        
        $dataUser = array();
    
        $users = User::where("angkatan", $val["angkatan"])->orderBy('name')->get();

        foreach ($users as $user) {
            $dataUser[] = $user->toArray();
        }

        // return $dataUser;
        $pdf = Pdf::loadView("cetak-barcode.pdf-barcode", compact("dataUser"));
        $pdf->setPaper("a4", "potrait");
        return $pdf->stream('barcode.pdf');
    }
}
