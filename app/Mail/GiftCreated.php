<?php

namespace App\Mail;

use App\Models\Gift;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GiftCreated extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Gift $gift)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau cadeau ajouté',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.gift-created',
            with: [
                'name' => $this->gift->name,
                'price' => $this->gift->price,
            ],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('images/bellahu123-gift-4663231.jpg')),
        ];
    }
}
