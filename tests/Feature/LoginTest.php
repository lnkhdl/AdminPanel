<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_login_form_when_not_authenticated()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function user_can_log_in_with_correct_credentials()
    {
        $password = 'test_pass_123';
        $user = User::factory([
            'password' => bcrypt($password),
        ])->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_cannot_log_in_with_incorrect_credentials()
    {
        $user = User::factory([
            'password' => bcrypt('test_pass_123'),
        ])->create();

        // firstly open Login page so redirect back() is then to Login page not /
        $response = $this->get('/login');
        $response->assertStatus(200);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'invalid_pass',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function not_authenticated_user_is_redirected_from_dashboard_to_login()
    {
        $this->get('/')->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_is_redirected_from_login_to_dashboard()
    {
        $user = User::factory()->make();

        $this->actingAs($user)->get('/login')->assertRedirect('/');
    }
}
