<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Milon\Barcode\DNS2D;
use Spatie\Glide\GlideImage;
use Intervention\Image\Facades\Image;

class SiswaController extends Controller
{
    public function showPage()
    {
        $query = User::query()
            ->select('A.*', 'B.jurusan_name', 'B.jurusan_code', 'C.role')
            ->from('users AS A')
            ->join('jurusan AS B', 'A.jurusan_id', '=', 'B.jurusan_id')
            ->join('role AS C', 'A.role_id', '=', 'C.role_id')
            ->where('C.role', '=', 'siswa');

        $siswa = $query->get();
        return view('data_siswa.index', compact(['siswa']));
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
        // $request['barcode'] = $qr_value;

        if ($this->isQRCodeExists($qr_value)) {
            $qr_value = mt_rand(1000000000, 9999999999);
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

        User::create($data);

        return redirect()->route('data-siswa');
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
