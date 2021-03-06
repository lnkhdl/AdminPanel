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
        $role->permissions()->sync([1, 2, 3, 4]);

        $role = Role::create(['name' => 'Supervisor']);
        $role->permissions()->sync([1, 2, 3]);

        $role = Role::create(['name' => 'Operator']);
        $role->permissions()->sync([2]);

        Role::create(['name' => 'User']);
    }
}
