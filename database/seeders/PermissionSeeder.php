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
        // Users
        Permission::create(['id' => 1, 'name' => 'user.viewAny', 'description' => 'Permission to view a list of all users.']);
        Permission::create(['id' => 2, 'name' => 'user.view', 'description' => 'Permission to view details about a user.']);
        Permission::create(['id' => 3, 'name' => 'user.create', 'description' => 'Permission to create a user.']);
        Permission::create(['id' => 4, 'name' => 'user.update', 'description' => 'Permission to update a user.']);
        Permission::create(['id' => 5, 'name' => 'user.delete', 'description' => 'Permission to delete a user.']);

        // Issues
        Permission::create(['id' => 6, 'name' => 'issue.any', 'description' => 'Permission to manage any issues.']);
        Permission::create(['id' => 7, 'name' => 'issue.my', 'description' => 'Permission to manage only reported and assigned issues.']);
    }
}
