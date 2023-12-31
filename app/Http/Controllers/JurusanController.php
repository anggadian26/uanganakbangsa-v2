<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function index() {
        $query = "
            SELECT *
            FROM jurusan
            ORDER BY jurusan_code ASC
        ";

        $jurusan = DB::select($query);

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('jurusan.index', compact(['jurusan']));
    }

    public function AddData(Request $request)
    {
        $validate = $request->validate([
            'jurusan_code' => 'required',
            'jurusan_name' => 'required'
        ]);

        $jurusanCode = strtoupper($validate['jurusan_code']);
        $jurusanName = strtoupper($validate['jurusan_name']);

        $data = [
            'jurusan_code'   => $jurusanCode,
            'jurusan_name'   => $jurusanName
        ];

        $jurusan = JurusanModel::create($data);

        return redirect()->route('indexJurusan')->with('toast_success', 'Data jurusan berhasil ditambahkan!');
    }

    public function deleteData($id) {
        JurusanModel::find($id)->delete();

        return redirect()->route('indexJurusan')->with('toast_success', 'Data jurusan berhasil dihapus!');
    }
}
