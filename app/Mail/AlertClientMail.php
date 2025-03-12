<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AlertClientMail extends Mailable
{
    use Queueable, SerializesModels;

    private $nom_client;
    private $nom_entreprise;

    private $pdf_path;

    /**
     * Create a new message instance.
     */
    public function __construct($nom_client, $pdf_path, $nom_entreprise)
    {
        //*

        $this->nom_client = $nom_client;
        $this->nom_entreprise = $nom_entreprise;
        $this->pdf_path = $pdf_path;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alert Client Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.alert_client',
            with:[
                'nom_client' => $this->nom_client,
                'nom_entreprise' => $this->nom_entreprise,
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
        return [
            \Illuminate\Mail\Mailables\Attachment::fromPath($this->pdf_path)->as('facture_'.basename($this->pdf_path))->withMime('application/pdf'),
        ];
    }
}
