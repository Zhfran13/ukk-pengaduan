<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Pengaduan::factory(20)->create();
        \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            "name" => "Andi Zulfikar",
            "username" => "fikar123",
            "password" => Hash::make('123'),
            "nik" => "092342034981",
            "telp" => "0934839248",
            "level" => "petugas",
            "email" => "ryuexpecto13@gmail.com"
        ]);

        User::create([
            "name" => "Thoriq Mallarangeng",
            "username" => "thor",
            "password" => Hash::make('123'),
            "nik" => "234324234324324",
            "telp" => "767868768",
            "level" => "masyarakat",
            "email" => "aanganteng70@gmail.com"
        ]);
    }
}
