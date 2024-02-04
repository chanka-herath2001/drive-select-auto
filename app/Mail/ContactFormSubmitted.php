<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $userMessage;

    

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $message)
{
    $this->name = $name;
    $this->email = $email;
    $this->userMessage = $message;
}

// Use with method to pass the data with a different name
public function build()
{
    return $this->from(config('mail.from.address'))
                ->subject('New Contact Form Submission')
                ->view('emails.contact-form')
                ->with(['name' => $this->name, 'email' => $this->email, 'userMessage' => $this->userMessage]);
}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Submitted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
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
