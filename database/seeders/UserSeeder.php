<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*--------Create Super Admin--------*/
        User::create([
            'name' => 'Super Admin',
            'role' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'phone' => '123456789',
            'password' => Hash::make('12345678'),
            'status' => true
        ]);

        /*--------Create User--------*/
        User::create([
            'name' => 'Jone Doe',
            'role' => 'user',
            'email' => 'user@gmail.com',
            'phone' => '123456789',
            'password' => Hash::make('12345678'),
            'status' => true
        ]);
    }
}