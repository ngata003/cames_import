<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertImportateur extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    private $nom_client;
    private $total_achat;
    private $nom_entreprise;

    private $nom_gestionnaire;
    public function __construct($nom_client, $nom_entreprise, $total_achat,$nom_gestionnaire)
    {
        //

        $this->nom_client = $nom_client;
        $this->nom_entreprise= $nom_entreprise;
        $this->total_achat = $total_achat;
        $this->nom_gestionnaire = $nom_gestionnaire;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alert Importateur',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.alert_importateur',
            with: [
                'nom_client' => $this->nom_client,
                'nom_entreprise' => $this->nom_entreprise,
                'total_achat'=>$this->total_achat,
                'nom_gestionnaire' => $this->nom_gestionnaire,
            ],
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
