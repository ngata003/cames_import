<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifiedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    private $nom_client;
    private $nom_entreprise;

    private $total_achat;
    /**
     * Create a new message instance.
     */
    public function __construct($nom_client, $total_achat, $nom_entreprise)
    {
        //

        $this->nom_entreprise = $nom_entreprise;
        $this->total_achat = $total_achat;
        $this->nom_client = $nom_client;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notified Admin',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.alert_admin',
            with:[
                'nom_entreprise' => $this->nom_entreprise,
                'nom_client' => $this->nom_client,
                'total_achat' => $this->total_achat,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
