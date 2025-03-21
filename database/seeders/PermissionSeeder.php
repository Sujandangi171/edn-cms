<?php

namespace Database\Seeders;

use App\Models\System\Permission;
use App\Models\System\Module;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    protected $module;
    public function __construct(Module $module)
    {
        $this->module = $module;
    }
    public function run()
    {
        $categories = 'categories';
        $menus = 'menus';
        $translations = 'translations';
        $configs = 'configs';
        $roles = 'roles';
        $modules = 'modules';
        $activityLog = 'activity-logs';
        $loginLogs = 'login-logs';
        $users = 'users';

        $permissions = [
            //Dashboard
            [
                'module_id' =>  moduleId('home'),
                'name' => 'View Dashboard',
                'url' => 'home',
                'method' => 'GET'
            ],

            //Category Management
            [
                'module_id' =>  moduleId($categories),
                'name' => 'List Categories',
                'url' => $categories,
                'method' => 'GET'
            ],

            [
                'module_id' =>  moduleId($categories),
                'name' => 'Create Categories',
                'url' => $categories . '/create',
                'method' => 'POST'
            ],
            [
                'module_id' =>  moduleId($categories),
                'name' => 'Edit Categories',
                'url' => $categories . '/*/edit',
                'method' => 'PUT'

            ],
            [
                'module_id' =>  moduleId($categories),
                'name' => 'Delete Categories',
                'url' => $categories . '/*',
                'method' => 'DELETE'
            ],

            //Menu Management
            [
                'module_id' =>  moduleId($menus),
                'name' => 'List Menu',
                'url' => $menus,
                'method' => 'GET'
            ],

            [
                'module_id' =>  moduleId($menus),
                'name' => 'Create Menu',
                'url' => $menus . '/create',
                'method' => 'POST'
            ],
            [
                'module_id' =>  moduleId($menus),
                'name' => 'Edit Menu',
                'url' => $menus . '/*/edit',
                'method' => 'PUT'

            ],
            [
                'module_id' =>  moduleId($menus),
                'name' => 'Delete Menu',
                'url' => $menus . '/*',
                'method' => 'DELETE'
            ],

            //Translation Management
            [
                'module_id' =>  moduleId($translations),
                'name' => 'List Translation',
                'url' => $translations,
                'method' => 'GET'
            ],

            [
                'module_id' =>  moduleId($translations),
                'name' => 'Create Translation',
                'url' => $translations . '/create',
                'method' => 'POST'
            ],
            [
                'module_id' =>  moduleId($translations),
                'name' => 'Edit Translation',
                'url' => $translations . '/*/edit',
                'method' => 'PUT'

            ],
            [
                'module_id' =>  moduleId($translations),
                'name' => 'Delete Translation',
                'url' => $translations . '/*',
                'method' => 'DELETE'
            ],

            //System Config
            [
                'module_id' =>  moduleId($configs),
                'name' => 'List Config',
                'url' => $configs,
                'method' => 'GET'
            ],

            [
                'module_id' =>  moduleId($configs),
                'name' => 'Create Config',
                'url' => $configs . '/create',
                'method' => 'POST'
            ],
            [
                'module_id' =>  moduleId($configs),
                'name' => 'Edit Config',
                'url' => $configs . '/*/edit',
                'method' => 'PUT'

            ],
            [
                'module_id' =>  moduleId($configs),
                'name' => 'Delete Config',
                'url' => $configs . '/*',
                'method' => 'DELETE'
            ],

            //Roles
            [
                'module_id' =>  moduleId($roles),
                'name' => 'List Roles',
                'url' => $roles,
                'method' => 'GET'
            ],

            [
                'module_id' =>  moduleId($roles),
                'name' => 'Create Roles',
                'url' => $roles . '/create',
                'method' => 'POST'
            ],
            [
                'module_id' =>  moduleId($roles),
                'name' => 'Edit Roles',
                'url' => $roles . '/*/edit',
                'method' => 'PUT'

            ],
            [
                'module_id' =>  moduleId($roles),
                'name' => 'Delete Roles',
                'url' => $roles . '/*',
                'method' => 'DELETE'
            ],

            //Users
            [
                'module_id' =>  moduleId($users),
                'name' => 'List Users',
                'url' => $users,
                'method' => 'GET'
            ],

            [
                'module_id' =>  moduleId($users),
                'name' => 'Create Users',
                'url' => $users . '/create',
                'method' => 'POST'
            ],
            [
                'module_id' =>  moduleId($users),
                'name' => 'Edit Users',
                'url' => $users . '/*/edit',
                'method' => 'PUT'

            ],

            [
                'module_id' =>  moduleId($users),
                'name' => 'Resend Password',
                'url' => 'resend-password/*',
                'method' => 'GET'
            ],


            //Modules
            [
                'module_id' =>  moduleId($modules),
                'name' => 'List Module',
                'url' => $modules,
                'method' => 'GET'
            ],

            [
                'module_id' =>  moduleId($modules),
                'name' => 'Create Modules',
                'url' => $modules . '/create',
                'method' => 'POST'
            ],
            [
                'module_id' =>  moduleId($modules),
                'name' => 'Edit Modules',
                'url' => $modules . '/*/edit',
                'method' => 'PUT'

            ],
            [
                'module_id' =>  moduleId($modules),
                'name' => 'Delete Modules',
                'url' => $modules . '/*',
                'method' => 'DELETE'
            ],
            [
                'module_id' =>  moduleId($modules),
                'name' => 'View Permissions',
                'url' => 'permissions',
                'method' => 'GET'
            ],

            //Login Logs
            [
                'module_id' =>  moduleId($loginLogs),
                'name' => 'List Login Logs',
                'url' => $loginLogs,
                'method' => 'GET'
            ],

            //Activity Logs
            [
                'module_id' =>  moduleId($activityLog),
                'name' => 'List Activity Log',
                'url' => $activityLog,
                'method' => 'GET'
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrInsert(
                ['url' => $permission['url']],
                [
                    'module_id' => $permission['module_id'],
                    'name' => $permission['name'],
                    'url' => $permission['url'],
                    'method' => $permission['method'],
                    'created_at' => Carbon::now()->toDateTime(),
                    'updated_at' => Carbon::now()->toDateTime()
                ]
            );
        }
    }
}
