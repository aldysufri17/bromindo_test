<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ktp;

class KtpSeeder extends Seeder
{
    public function run()
    {

        for ($i = 0; $i < 10000; $i++) {

            Ktp::create([
                'nik' => fake()->numerify('################'),
                'nama' => fake()->name(),
                'tanggal_lahir' => fake()->date(),
                'umur' => rand(18, 60),
                'alamat' => fake()->address()
            ]);
        }
    }
}