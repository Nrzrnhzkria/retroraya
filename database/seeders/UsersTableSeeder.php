<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'hun_id' => 'HUN001',
            'name' => 'Nurzarinah',
            'email' => 'nrz.work@gmail.com',
            'password' => \Hash::make('password'),
            'phone_no' => '+60123456789',
            'ic_no' => '1234567890',
            'role' => 'superadmin'
        ]);
    }
}
