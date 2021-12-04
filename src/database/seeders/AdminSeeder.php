<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_city' => 1,
            'name' => 'admin',
            'address' => 'Manggo Number 3',
            'phone' => '081512341234',
            'zip' => 13020,
            'status' => User::STATUS_ACTIVE,
            'role' => User::ROLE_ADMIN,
            'email' => 'ishaq.adhel@gmail.com',
            'password' => Hash::make('adminadmin'),
        ]);
    }
}
