<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PropostaAceita extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cliente_name,$profissional_name,$orcamento_titulo)
    {
        $this->cliente_name = $cliente_name;
        $this->profissional_name = $profissional_name;
        $this->orcamento_titulo = $orcamento_titulo;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('contato@delivroo.app.br', 'RMR Part Time'),
            subject: 'Sua proposta foi aceita',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'propostaAceita',
            with: [
                'cliente_name' => $this->cliente_name,
                'profissional_name' => $this->profissional_name,
                'orcamento_titulo' => $this->orcamento_titulo]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
