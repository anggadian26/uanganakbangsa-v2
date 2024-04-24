<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDewaController extends Controller
{
    public function showData(){
        $query = User::query()
            ->select('A.*', 'C.role')
            ->from('users AS A')
            ->join('role AS C', 'A.role_id', '=', 'C.role_id')
            ->where('C.role', '=', 'admin')
            ->orWhere('C.role', '=', 'pamong')
            ->orderBy('A.name', 'ASC');

        $user = $query->get();

        $queryRole = "
            SELECT *
            FROM role
        ";

        $role = DB::select($queryRole);
        return view('dewa.users', compact(['user', 'role']));
    }

    public function addUserDewa(Request $request)
    {
        $qr_value = mt_rand(1000000000, 9999999999);

        if ($this->isQRCodeExists($qr_value)) {
            $qr_value = mt_rand(1000000000, 9999999999);
        }


        $validate = $request->validate([
            'name'  => 'required',
            'username'      => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'role_id'       => 'required'
        ]);

        $data = [
            'name'  => $validate['name'],
            'jurusan_id' => 99,
            'angkatan'  => 99,
            'username'  => $validate['username'],
            'email'     => $validate['email'],
            'password'  => Hash::make($validate['password']),
            'role_id'   => $validate['role_id'],
            'barcode'   => $qr_value,
            'pin'       => 9999
        ];

        $user = User::create($data);

        return redirect()->route('dewaUser2696')->with('toast_success', 'Data User berhasil ditambahkan!');
    }
    private function isQRCodeExists($qr_value)
    {
        return User::where('barcode', $qr_value)->exists();
    }

    public function deleteUserDewa($id) 
    {
        User::find($id)->delete();
        return redirect()->route('dewaUser2696')->with('toast_success', 'Data User berhasil dihapus!');
    }
}
