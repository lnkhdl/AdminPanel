<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Users
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(TestUserSeeder::class);
        $this->call(UserSeeder::class);
        
        // Issues
        $this->call(Issues\TypeSeeder::class);
        $this->call(Issues\StatusSeeder::class);
        $this->call(Issues\WorkflowSeeder::class);
    }
}
