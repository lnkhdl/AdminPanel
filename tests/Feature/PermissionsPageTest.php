<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PermissionsPageTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /** @test */
    public function not_authenticated_user_is_redirected_from_permissions_page_to_login_page()
    {
        $this->get('/permissions')->assertRedirect('/login');
    }

    /** @test */
    public function user_who_is_not_admin_cannot_access_permissions_page()
    {
        $user = $this->createUserWithSpecificRole('User');

        $this->actingAs($user)->get('/permissions')->assertStatus(403);
    }

    /** @test */
    public function user_who_is_admin_can_access_permissions_page()
    {
        $user = $this->createUserWithSpecificRole('Administrator');

        $this->actingAs($user)->get('/permissions')->assertSuccessful();
    }  
}