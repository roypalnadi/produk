<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create(
            [
                "name" => "roy",
                "email" => "admin@gmail.com",
                "password" => 'admin123',
            ],
        );
    }
}
