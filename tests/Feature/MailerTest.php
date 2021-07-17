<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function welcome_email_can_be_sent()
    {
        $user = User::factory()->create();
        $token = app(PasswordBroker::class)->createToken($user);
        
        Mail::fake();
        Mail::send(new WelcomeMail($user, $token));
        Mail::assertSent(WelcomeMail::class);
    }

    /** @test */
    public function welcome_email_content_is_correct()
    {
        $user = User::factory()->create(['email' => 'test@email.com']);
        $token = app(PasswordBroker::class)->createToken($user);
        
        $mailable = new WelcomeMail($user, $token);

        $mailable->assertSeeInHtml('/reset-password/' . $token . '?email=test%40email.com');
        $mailable->assertSeeInHtml('Please set your password:');
    }
}
