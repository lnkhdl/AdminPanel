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
        // Task => type 1, ID 1-4
        Status::create(['id' => 1, 'name' => 'Submitted', 'issue_type_id' => 1]);
        Status::create(['id' => 2, 'name' => 'In Progress', 'issue_type_id' => 1]);
        Status::create(['id' => 3, 'name' => 'Blocked', 'issue_type_id' => 1]);
        Status::create(['id' => 4, 'name' => 'Done', 'issue_type_id' => 1]);

        // Request => type 2, ID 5-11
        Status::create(['id' => 5, 'name' => 'Submitted', 'issue_type_id' => 2]);
        Status::create(['id' => 6, 'name' => 'Approved', 'issue_type_id' => 2]);
        Status::create(['id' => 7, 'name' => 'Rejected', 'issue_type_id' => 2]);
        Status::create(['id' => 8, 'name' => 'In Progress', 'issue_type_id' => 2]);
        Status::create(['id' => 9, 'name' => 'Ready for Review', 'issue_type_id' => 2]);
        Status::create(['id' => 10, 'name' => 'In Review', 'issue_type_id' => 2]);
        Status::create(['id' => 11, 'name' => 'Done', 'issue_type_id' => 2]);
        Status::create(['id' => 12, 'name' => 'Rework needed', 'issue_type_id' => 2]);
    }
}
