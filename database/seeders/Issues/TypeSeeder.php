<?php

namespace Database\Seeders\Issues;

use App\Models\Issues\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['id' => 1, 'name' => 'Task']);
        Type::create(['id' => 2, 'name' => 'Request']);
    }
}
