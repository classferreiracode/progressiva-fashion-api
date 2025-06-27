<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContatoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dados;

    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    public function build()
    {
        return $this->subject('📬 Novo Contato: ' . $this->dados['assunto'])
            ->view('emails.contato') // Usando view em vez de markdown
            ->with('dados', $this->dados);
    }
}
