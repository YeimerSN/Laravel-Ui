<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $editor1 = User::create([
            'name'     => 'Alejandro Vargas',
            'email'    => 'a.vargas@prueba.com',
            'password' => Hash::make('password'),
        ]);
        $editor1->assignRole('editor');

        $editor2 = User::create([
            'name'     => 'Beatriz Mendoza',
            'email'    => 'b.mendoza@prueba.com',
            'password' => Hash::make('password'),
        ]);
        $editor2->assignRole('editor');

        $user1 = User::create([
            'name'     => 'Carlos Ruíz',
            'email'    => 'c.ruiz@prueba.com',
            'password' => Hash::make('password'),
        ]);
        $user1->assignRole('user');

        $user2 = User::create([
            'name'     => 'Diana Morales',
            'email'    => 'd.morales@prueba.com',
            'password' => Hash::make('password'),
        ]);
        $user2->assignRole('user');
    }
}
