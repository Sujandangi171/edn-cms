<?php

namespace Database\Seeders;

use App\Models\System\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'Dashboard Management',
                'route' => 'home',
            ],
            [
                'name' => 'Category Management',
                'route' => 'categories'
            ],
            [
                'name' => 'User Management',
                'route' => 'users'
            ],
            [
                'name' => 'Menu Management',
                'route' => 'menus'
            ],
            [
                'name' => 'Translation Management',
                'route' => 'translations'
            ],
            [
                'name' => 'Module Management',
                'route' => 'modules'
            ],
            [
                'name' => 'System Config',
                'route' => 'configs'
            ],
            [
                'name' => 'Activity Log',
                'route' => 'activity-logs'
            ],
            [
                'name' => 'Login Log',
                'route' => 'login-logs'
            ],
            [
                'name' => 'Role',
                'route' => 'roles'
            ],
        ];

        foreach ($roles as $role) {
            Module::updateOrInsert(
                ['route' => $role['route']],
                [
                    'name' => $role['name'],
                ]
            );
        }
    }
}
