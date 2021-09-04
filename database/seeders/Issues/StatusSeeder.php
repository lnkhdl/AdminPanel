<?php

namespace Database\Seeders\Issues;

use App\Models\Issues\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Type 1 = task
        Status::create(['name' => 'New', 'issue_type_id' => 1]);
        Status::create(['name' => 'In Progress', 'issue_type_id' => 1]);
        Status::create(['name' => 'Blocked', 'issue_type_id' => 1]);
        Status::create(['name' => 'Done', 'issue_type_id' => 1]);
    }
}
