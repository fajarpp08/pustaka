<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'alamat' => 'Padang',
            'noanggota' => 'PERP-0011',
            'nohp' => '081234567890',
            'password' => Hash::make('123'),
            'role' => 'Admin',
        ]);
        User::create([
            'nama' => 'User',
            'email' => 'user@gmail.com',
            'alamat' => 'Padang',
            'noanggota' => 'PERP-0022',
            'nohp' => '081234567891',
            'password' => Hash::make('123'),
            'role' => 'User',
        ]);
    }
}
