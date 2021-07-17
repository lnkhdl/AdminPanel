<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $token;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User $user
     * @return void
     */
    public function __construct(User $user, string $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to ' . config('app.name'))
                    ->to($this->user->email)
                    ->markdown('emails.welcome', [
                        'firstName' => $this->user->first_name,
                        'token' => $this->token,
                        'email' => $this->user->email,
                    ]);
    }
}
