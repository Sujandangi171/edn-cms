<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ContentTypeSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ContentTypeSeeder::class);
        $this->call(JobTypeSeeder::class);
    }
}
