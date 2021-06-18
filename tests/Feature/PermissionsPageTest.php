<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionsPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function not_authenticated_user_is_redirected_from_permissions_page_to_login_page()
    {
        $this->get('/permissions')->assertRedirect('/login');
    }
}