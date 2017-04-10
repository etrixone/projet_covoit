<?php

namespace App\Mail;

use App\Trajet;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuppressionTrajetCovoitureur extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $trajet;
            
    public function __construct(Trajet $t)
    {
        $this->trajet = $t;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.suppression-trajet-covoitureur')
                ->with ('trajet', $this->trajet);
    }
}
