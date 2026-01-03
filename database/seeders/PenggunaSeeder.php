<?php

namespace Database\Seeders;

use App\Models\pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pengguna::updateOrCreate(
            ['username' => 'admin'],
            [
                'nama' => 'Administrator',
                'password' => 'admin123', // Cast 'hashed' di model akan otomatis hash
                'role' => 'admin',
            ]
        );
    }
}
