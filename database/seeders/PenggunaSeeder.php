<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pengguna::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
    }
}
