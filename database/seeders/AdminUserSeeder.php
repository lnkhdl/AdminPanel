<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Main',
            'last_name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
        ]);

        $user->roles()->sync([1]);
    }
}
