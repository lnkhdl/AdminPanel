<?php

namespace Database\Seeders\Issues;

use App\Models\Issues\Workflow;
use Illuminate\Database\Seeder;

class WorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Type 1 = Task
        Workflow::create(['issue_status_id' => 1, 'next_possible_status' => 2]);
        Workflow::create(['issue_status_id' => 1, 'next_possible_status' => 3]);
        Workflow::create(['issue_status_id' => 2, 'next_possible_status' => 1]);
        Workflow::create(['issue_status_id' => 2, 'next_possible_status' => 3]);
        Workflow::create(['issue_status_id' => 2, 'next_possible_status' => 4]);
        Workflow::create(['issue_status_id' => 3, 'next_possible_status' => 2]);
        Workflow::create(['issue_status_id' => 4, 'next_possible_status' => 2]);

        // Type 2 = Request
        Workflow::create(['issue_status_id' => 5, 'next_possible_status' => 6]);
        Workflow::create(['issue_status_id' => 5, 'next_possible_status' => 7]);
        Workflow::create(['issue_status_id' => 6, 'next_possible_status' => 5]);
        Workflow::create(['issue_status_id' => 6, 'next_possible_status' => 8]);
        Workflow::create(['issue_status_id' => 7, 'next_possible_status' => 5]);
        Workflow::create(['issue_status_id' => 8, 'next_possible_status' => 5]);
        Workflow::create(['issue_status_id' => 8, 'next_possible_status' => 9]);
        Workflow::create(['issue_status_id' => 9, 'next_possible_status' => 10]);
        Workflow::create(['issue_status_id' => 10, 'next_possible_status' => 11]);
        Workflow::create(['issue_status_id' => 10, 'next_possible_status' => 12]);
        Workflow::create(['issue_status_id' => 11, 'next_possible_status' => 12]);
        Workflow::create(['issue_status_id' => 12, 'next_possible_status' => 5]);
    }
}
