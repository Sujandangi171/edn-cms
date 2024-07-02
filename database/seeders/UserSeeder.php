<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\System\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function run()
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'role_id' => $this->role->where('slug', 'super_admin')->value('id'),
                'password' => Hash::make('123admin@'),
            ],
            [
                'name' => 'Sujan Dangi',
                'email' => 'sujan@gmail.com',
                'username' => 'sujan_dangi',
                'role_id' => $this->role->where('slug', 'admin')->value('id'),
                'password' => Hash::make('Sujan@123'),
            ],
            [
                'name' => 'Dibya Maharjan',
                'email' => 'dibya_dangi@gmail.com',
                'username' => 'dibya_maharjan',
                'role_id' => $this->role->where('slug', 'client')->value('id'),
                'password' => Hash::make('Dibya@123'),
            ],


        ];

        foreach ($users as $user) {
            User::updateOrInsert(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'is_password_set' => true,
                    'username' => $user['username'],
                    'password' => $user['password'],
                ]
            );
        }
    }
}
