<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'professional'],
            ['name' => 'client'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@mail.com',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name' => 'Professional User',
                'email' => 'professional@mail.com',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name' => 'Client User',
                'email' => 'client@mail.com',
                'password'=> bcrypt('12345678'),
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }

        # Asignar roles
        $admin = \App\Models\User::where('email', 'admin@mail.com')->first();
        $professional = \App\Models\User::where('email', 'professional@mail.com')->first();
        $client = \App\Models\User::where('email', 'client@mail.com')->first();

        $admin->assignRole('admin');
        $professional->assignRole('professional');
        $client->assignRole('client');
    }
}
