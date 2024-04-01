<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'last_name'      => '',
                'company_name'   => '',
                'country'        => '',
                'city'           => '',
                'state'          => '',
            ],
        ];

        User::insert($users);
    }
}
