<?php

namespace App\Exports;

use App\Models\Ktp;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KtpExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Ktp::query();
    }

    public function headings(): array
    {
        return [
            'No',
            'NIK',
            'Nama',
            'Tanggal Lahir',
            'Umur',
            'Alamat'
        ];
    }

    public function map($ktp): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $ktp->nik,
            $ktp->nama,
            $ktp->tanggal_lahir,
            $ktp->umur,
            $ktp->alamat
        ];
    }
}