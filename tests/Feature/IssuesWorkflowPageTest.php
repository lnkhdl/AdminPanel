<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Issues\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IssuesWorkflowPageTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /** @test */
    public function user_who_is_not_admin_cannot_access_workflow_page()
    {
        $user = $this->createUserWithSpecificRole('User');

        $this->actingAs($user)->get('/issues_workflow')->assertStatus(403);
    }

    /** @test */
    public function user_who_is_admin_can_access_workflow_page()
    {
        Type::create(['name' => 'TestType']);
        $user = $this->createUserWithSpecificRole('Administrator');

        $this->actingAs($user)->get('/issues_workflow')->assertSuccessful();
    }
}
