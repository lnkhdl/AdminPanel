<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IssuesListPagesTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /** @test */
    public function user_who_is_permitted_can_access_all_issues_page()
    {
        $user = $this->createUserWithSpecificRole('Operator');
        $this->actingAs($user)->get('/issues?range=all')->assertSuccessful();
    }

    /** @test */
    public function user_who_is_not_permitted_cannot_access_all_issues_page()
    {
        $user = $this->createUserWithSpecificRole('NoPermission');
        $this->actingAs($user)->get('/issues?range=all')->assertStatus(403);
    }

    /** @test */
    public function user_who_is_permitted_can_access_my_reported_issues_page()
    {
        $user = $this->createUserWithSpecificRole('User');
   
        $this->actingAs($user)->get('/issues?range=my_reported')->assertSuccessful();
    }

    /** @test */
    public function user_who_is_not_permitted_cannot_access_my_reported_issues_page()
    {
        $user = $this->createUserWithSpecificRole('NoPermission');
        $this->actingAs($user)->get('/issues?range=my_reported')->assertStatus(403);
    }

    /** @test */
    public function user_who_is_permitted_can_access_my_assigned_issues_page()
    {
        $user = $this->createUserWithSpecificRole('User');
        $this->actingAs($user)->get('/issues?range=my_assigned')->assertSuccessful();
    }

    /** @test */
    public function user_who_is_not_permitted_cannot_access_my_assigned_issues_page()
    {
        $user = $this->createUserWithSpecificRole('NoPermission');
        $this->actingAs($user)->get('/issues?range=my_assigned')->assertStatus(403);
    }
}
