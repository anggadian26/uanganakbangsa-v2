<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TransaksiNowController extends Controller
{
    public function showDataNow(Request $request)
    {
        $hariIni = Carbon::now()->toDateString();
        $name = $request->name;
        $query = "
            SELECT A.*, B.*, C.jurusan_id, C.jurusan_name
            FROM tabungan A
            INNER JOIN users B ON A.user_id = B.id
            INNER JOIN jurusan C ON B.jurusan_id = C.jurusan_id
            WHERE A.tanggal = '$hariIni'    
        ";

        if($name != null && $name != '') {
            $query .= " AND B.name LIKE '%$name%'";
        }

        $query .= " ORDER BY B.angkatan ASC, B.name ASC";

        $result = DB::select($query);

        return view('transaksi-sekarang.index', ['data' => $result]);
    }
}
