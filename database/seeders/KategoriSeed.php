<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        KategoriProduk::create(
            [
                "nama" => "Alat Olahraga",
            ],
        );
        KategoriProduk::create(
            [
                "nama" => "Alat Musik",
            ]
        );
    }
}
