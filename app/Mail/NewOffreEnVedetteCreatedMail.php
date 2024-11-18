<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\OffreEnVedette;
use Illuminate\Queue\SerializesModels;

class NewOffreEnVedetteCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $OffreEnVedette;

    /**
     * Create a new message instance.
     *
     * @param
     * @return void
     */
    public function __construct(OffreEnVedette $OffreEnVedette)
    {
        $this->OffreEnVedette = $OffreEnVedette;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_offre_en_vedette_created')
                    ->with([
                        'titre' => $this->OffreEnVedette->titre,
                        'description' => $this->OffreEnVedette->description,
                        'user' => $this->OffreEnVedette->user,
                    ]);
    }
}

