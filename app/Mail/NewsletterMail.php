<?php
namespace App\Mail;

use App\Models\Article;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Article $article, public Subscriber $subscriber) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: '📰 '.$this->article->title.' — Comclusives');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.newsletter');
    }
}
