<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use App\Models\SaldoModel;
use App\Models\TabunganModel;
use App\Models\User;
use Illuminate\Http\Request;

class ReqDeleteController extends Controller
{
    public function index() {
        return view('req-delete.index');
    }

    public function action(Request $request) {
        $validate = $request->validate([
            'angkatan' => 'required'
        ]);

        $angkatan = $validate['angkatan'];

        $user = User::where('angkatan', $angkatan)->pluck('id');

        TabunganModel::whereIn('user_id', $user)->delete();

        SaldoModel::whereIn('user_id', $user)->delete();

        User::where('angkatan', $angkatan)->delete();

        return redirect()->route('indexDeleteReq')->with('toast_success', 'Data has been deleted successfully.');
    }
}
