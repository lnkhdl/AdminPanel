<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::where('name', '!=', 'Administrator')->get();

        foreach ($roles as $role) {
            $user = User::create([
                'first_name' => 'Tester' . $role->id,
                'last_name' => $role->name,
                'email' => strtolower($role->name) . '@email.com',
                'password' => Hash::make('password'),
            ]);

            $user->roles()->sync([$role->id]);
        }
    }
}
