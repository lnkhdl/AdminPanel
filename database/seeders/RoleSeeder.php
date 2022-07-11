<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Administrator']);
        $role->permissions()->sync([1, 2, 3, 4, 5, 6, 7]);

        $role = Role::create(['name' => 'Supervisor']);
        $role->permissions()->sync([1, 2, 3, 4, 6, 7]);

        $role = Role::create(['name' => 'Operator']);
        $role->permissions()->sync([1, 2, 6, 7]);

        $role = Role::create(['name' => 'User']);
        $role->permissions()->sync([7]);

        $role = Role::create(['name' => 'NoPermission']);
    }
}
