<?php

namespace App\Imports;

use App\Models\Ktp;
use Maatwebsite\Excel\Concerns\ToModel;

class KtpImport implements ToModel
{
    public function model(array $row)
    {
        return new Ktp([
            'nik' => $row[0],
            'nama' => $row[1],
            'tanggal_lahir' => $row[2],
            'umur' => $row[3],
            'alamat' => $row[4],
        ]);
    }
}