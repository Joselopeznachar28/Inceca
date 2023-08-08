<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Jose',
            'lastname' => 'Lopez',
            'identification' => '25431129',
            'email' => 'joselopeznachar28@gmail.com',
            'code' => 'Adm28',
            'username' => 'Admin',
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
