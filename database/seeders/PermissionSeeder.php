<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'user_create', 'description' => 'Permission to create a user.']);
        Permission::create(['name' => 'user_read', 'description' => 'Permission to read a user.']);
        Permission::create(['name' => 'user_update', 'description' => 'Permission to update a user.']);
        Permission::create(['name' => 'user_delete', 'description' => 'Permission to delete a user.']);
    }
}
