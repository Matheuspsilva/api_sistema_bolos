<?php

namespace App\Jobs;

use App\Mail\ListaInteresseMail as MailListaInteresseMail;
use App\Models\ListaInteresse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ListaInteresseMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public $lista_interesse, $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ListaInteresse $lista_interesse)
    {
        $this->lista_interesse = $lista_interesse;
        $this->user = $lista_interesse->cliente;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)
            ->send(new MailListaInteresseMail($this->lista_interesse));
    }
}
