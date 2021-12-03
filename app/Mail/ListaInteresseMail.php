<?php

namespace App\Mail;

use App\Models\ListaInteresse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListaInteresseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lista_interesse;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ListaInteresse $lista_interesse)
    {
        $this->lista_interesse = $lista_interesse;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Aviso de estoque')
            ->view('emails.lista-interesse');
    }
}
