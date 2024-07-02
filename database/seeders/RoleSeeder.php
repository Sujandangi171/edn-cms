<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\System\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function run()
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super_admin',
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'Client',
                'slug' => 'client',
            ],


        ];

        foreach ($roles as $role) {
            $this->model->updateOrInsert(
                ['slug' => $role['slug']],
                [
                    'name' => $role['name'] ?? null,
                    'slug' => $role['slug'] ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
