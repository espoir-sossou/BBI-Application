<?php

namespace App\Mail;

use App\Models\Annonce;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAnnonceCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $annonce;

    /**
     * Create a new message instance.
     *
     * @param  Annonce  $annonce
     * @return void
     */
    public function __construct(Annonce $annonce)
    {
        $this->annonce = $annonce;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_annonce_created')
                    ->with([
                        'titre' => $this->annonce->titre,
                        'description' => $this->annonce->description,
                        'user' => $this->annonce->user,
                    ]);
    }
}

