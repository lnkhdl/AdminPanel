<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 10) as $index)
        {
            $user = User::factory()->create();
            $user->roles()->sync([random_int(2, 4)]);
        }
    }
}
