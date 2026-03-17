<?php

namespace App\Imports;

use App\Models\Ktp;
use Maatwebsite\Excel\Concerns\ToModel;

class KtpImport implements ToModel
{
    public function model(array $row)
    {
        $umur = calculateAge($row[2]);
        return new Ktp([
            'nik' => $row[0],
            'nama' => $row[1],
            'tanggal_lahir' => $row[2],
            'umur'  => $umur,
            'alamat' => $row[3],
        ]);
    }
}