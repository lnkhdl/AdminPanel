<?php

namespace Database\Seeders\Issues;

use App\Models\Issues\Issue;
use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 15) as $index)
        {
            Issue::factory()->create(['issue_type_id' => 1, 'assigned_to' => 1]);
        }

        foreach(range(1, 20) as $index)
        {
            Issue::factory()->create(['issue_type_id' => 2, 'assigned_to' => 1]);
        }
        

        foreach(range(1, 25) as $index)
        {
            Issue::factory()->create();
        }
    }
}
