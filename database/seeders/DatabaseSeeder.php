<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $kode = User::orderBy('created_at','desc')->first();
        if (empty($kode) || $kode == "") {
            $kode_pengguna = "001";
        }else{
            $urutan = (int) substr($kode->kode_pengguna, 2);
            $kode_baru = $urutan+1;
            $kode_pengguna = sprintf("%03s", $kode_baru);
        }

        \App\Models\User::create([
            'kode_pengguna' =>  $kode_pengguna,
            'nama_pengguna' => 'Administrator',
            'email' => 'administrator@example.com',
            'jenis_kelamin' => 'L',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role'          =>  'admin',
        ]);
    }
}
