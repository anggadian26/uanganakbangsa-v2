<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TemplateExcelSiswa implements FromCollection, WithHeadings
{
    /**
    * @param Collection $collection
    */
    public function collection()
    {
        // Buat collection dengan data kosong sesuai dengan format yang diinginkan
        return collect([
            [
                
            ],
        ]);
    }

    public function headings(): array
    {
        // Sesuaikan headings dengan data yang akan diisi
        return [
            'No',
            'Nama',
            'Jurusan',
            'Angkatan',
            'Username',
            'Email',
            'Password',
            'Saldo',
        ];
    }
}
