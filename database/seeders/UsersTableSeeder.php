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
            'name' => 'System',
            'lastname' => 'Admin',
            'identification' => '12345678',
            'email' => 'admin@admin.com',
            'code' => 'SysAdm',
            'username' => 'Administrador',
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->update(['password' => Hash::make(12345678)]);
        $user->assignRole(['Administrador']);
    }
}
