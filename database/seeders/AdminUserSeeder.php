<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@smknegeri4bogor.test'],
            [
                'name' => 'Admin SMK 4',
                'password' => Hash::make('password123'),
                'is_admin' => true
            ]
        );
    }
}