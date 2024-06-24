<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'Admin'
        ]);

        User::create([
            'name' => 'Direktur',
            'email' => 'direktur@example.com',
            'password' => Hash::make('password'),
            'role' => 'Direktur'
        ]);

        User::create([
            'name' => 'Ka. Sub. Bag. Perlengkapan dan Aset',
            'email' => 'kasubbag@example.com',
            'password' => Hash::make('password'),
            'role' => 'Ka. Sub. Bag. Perlengkapan dan Aset'
        ]);

        User::create([
            'name' => 'Kepala Ruang Intensif Pria',
            'email' => 'kepalaruangpria@example.com',
            'password' => Hash::make('password'),
            'role' => 'Kepala Ruang Intensif Pria'
        ]);

        User::create([
            'name' => 'Kepala Instalasi Farmasi',
            'email' => 'kepalaruangfarmasi@example.com',
            'password' => Hash::make('password'),
            'role' => 'Kepala Instalasi Farmasi'
        ]);
    }
}
