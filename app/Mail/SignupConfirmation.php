<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->view('emails.signup_confirmation')
            ->subject('Bienvenue sur Bolivie Business Inter')
            ->with([
                'prenom' => $this->user->prenom,
                'email' => $this->user->email,
                'password' => $this->password,
            ]);
    }
}
