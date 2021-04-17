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
        Permission::create(['name' => 'user.viewAny', 'description' => 'Permission to view a list of users.']);
        Permission::create(['name' => 'user.view', 'description' => 'Permission to view details about a user.']);
        Permission::create(['name' => 'user.create', 'description' => 'Permission to create a user.']);
        Permission::create(['name' => 'user.update', 'description' => 'Permission to update a user.']);
        Permission::create(['name' => 'user.delete', 'description' => 'Permission to delete a user.']);
    }
}
