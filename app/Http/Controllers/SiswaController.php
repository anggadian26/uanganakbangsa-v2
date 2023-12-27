<?php

namespace App\Http\Controllers;

use App\Models\SaldoModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Milon\Barcode\DNS2D;
use Spatie\Glide\GlideImage;
use Intervention\Image\Facades\Image;

date_default_timezone_set("Asia/Jakarta");

class SiswaController extends Controller
{
    public function showPage(Request $request)
    {
        $name = $request->name;
        $angkatan = $request->angkatan;
        $jurusan_id  = $request->jurusan_id;

        $queryJurusan = "
            SELECT jurusan_id, jurusan_code, jurusan_name
            FROM jurusan
            ORDER BY jurusan_name ASC
        ";
        $jurusan = DB::select($queryJurusan);

        $query = User::query()
            ->select('A.*', 'B.jurusan_name', 'B.jurusan_code', 'C.role')
            ->from('users AS A')
            ->join('jurusan AS B', 'A.jurusan_id', '=', 'B.jurusan_id')
            ->join('role AS C', 'A.role_id', '=', 'C.role_id')
            ->where('C.role', '=', 'siswa')
            ->when($name, function ($query, $name) {
                return $query->where('A.name', 'like', '%' . $name . '%');
            })
            ->when($angkatan, function ($query, $angkatan) {
                return $query->where('A.angkatan', $angkatan);
            })
            ->when($jurusan_id, function ($query, $jurusan_id) {
                return $query->where('A.jurusan_id', $jurusan_id);
            })
            ->orderBy('A.angkatan', 'ASC')
            ->orderBy('A.jurusan_id', 'ASC')
            ->orderBy('A.name', 'ASC');

        $siswa = $query->paginate(50);

        $queryCount = "
            SELECT COUNT(1) AS totalData
            FROM users A
            INNER JOIN role B ON A.role_id = B.role_id
            WHERE B.role = 'siswa'
        ";
        $total = DB::select($queryCount);

        return view('data_siswa.index', compact(['siswa', 'jurusan', 'total']));
    }

    public function addShowPage()
    {
        $queryjurusan = "
            SELECT *
            FROM jurusan
            ORDER BY jurusan_code ASC
        ";

        $jurusan = DB::select($queryjurusan);
        return view('data_siswa.tambah_data', compact(['jurusan']));
    }

    public function add_siswa(Request $request)
    {
        $qr_value = mt_rand(1000000000, 9999999999);

        if ($this->isQRCodeExists($qr_value)) {
            $qr_value = mt_rand(1000000000, 9999999999);
        }

        if ($request->saldo == null) {
            $saldo = 0;
        } else {
            $saldo = $request->saldo;
        }

        $validate = $request->validate([
            'name'  => 'required',
            'jurusan_id'    => 'required',
            'angkatan'      => 'required',
            'username'      => 'required',
            'email'         => 'required',
            'password'      => 'required'
        ]);

        $data = [
            'name'  => $validate['name'],
            'jurusan_id' => $validate['jurusan_id'],
            'angkatan'  => $validate['angkatan'],
            'username'  => $validate['username'],
            'email'     => $validate['email'],
            'password'  => Hash::make($validate['password']),
            'role_id'   => 3,
            'barcode'   => $qr_value
        ];

        $user = User::create($data);

        $datetime = Carbon::now();

        SaldoModel::create([
            'user_id'       => $user->id,
            'saldo_amount'  => $saldo,
            'update'        => $datetime
        ]);

        return redirect()->route('data-siswa')->with('toast_success', 'Data siswa berhasil ditambahkan!');
    }

    private function isQRCodeExists($qr_value)
    {
        return User::where('barcode', $qr_value)->exists();
    }

    public function downloadQRCode($barcode, $info)
    {
        $dns2d = new DNS2D();

        // Menghasilkan gambar QR Code
        $qrCode = $dns2d->getBarcodePNG($barcode, 'QRCODE', 6, 6);

        // Mengonversi QR Code menjadi objek Intervention Image
        $qrImage = Image::make($qrCode);

        // Menambahkan informasi di sebelah QR Code
        $qrImage->text($info, $qrImage->getWidth() + 10, $qrImage->getHeight() / 2, function ($font) {
            $font->file(public_path('path-to-your-font.ttf'));
            $font->size(24);
            $font->color('#000000');
            $font->align('left');
            $font->valign('middle');
        });

        // Menyimpan atau menampilkan gambar
        $qrImage->save(public_path('path-to-save/image.png'));

        return $qrImage->response('png');
    }
}
