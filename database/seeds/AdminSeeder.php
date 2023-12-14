<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '081234567890',
            'tanggal_lahir' => '1990-01-01',
            'tempat_lahir' => 'Jakarta',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // Gantilah 'password' dengan kata sandi yang diinginkan
            'role' => 0, // Sesuaikan dengan nilai default di migrasi ('role' => true) atau ('role' => '0')
        ]);
    }
}
