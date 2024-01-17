<?php

namespace App\Imports;

use App\Models\JurusanModel;
use App\Models\SaldoModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row) {
            $jurusan = JurusanModel::where('jurusan_code', $row['jurusan'])->first();
            
            $qr_value = mt_rand(1000000000, 9999999999);
            $validBarcode = User::where('barcode', $qr_value)->exists();
            if($validBarcode) {
                $qr_value = mt_rand(1000000000, 9999999999);
            }

            if($jurusan != NULL) {
                $user = User::create([
                    'name'          => $row['nama'],
                    'username'      => $row['username'],
                    'email'         => $row['email'],
                    'pin'           => $row['pin'],
                    'jurusan_id'    => $jurusan['jurusan_id'],
                    'angkatan'      => $row['angkatan'],
                    'barcode'       => $qr_value,
                    'role_id'       => 3,
                    'password'      => Hash::make($row['password']),
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now()
                ]);

                SaldoModel::create([
                    'user_id'       => $user->id,
                    'saldo_amount'  =>  $row['saldo'],
                    'update'        => Carbon::now(),
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now()
                ]);
            }
        }
    }
}
