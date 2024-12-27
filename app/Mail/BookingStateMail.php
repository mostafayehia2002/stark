<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingStateMail extends Mailable
{
    use Queueable, SerializesModels;
    public string $full_name;
    public string $bookingStatus;
    public $bookingId;
    public $bookingDate;
    public  $unitTitle;
    public $bookingLocation;
    public function __construct($full_name, $bookingStatus, $bookingId, $bookingDate, $unitTitle, $bookingLocation)
    {
        $this->full_name = $full_name;
        $this->bookingStatus = $bookingStatus;
        $this->bookingId = $bookingId;
        $this->bookingDate = $bookingDate;
        $this->unitTitle = $unitTitle;
        $this->bookingLocation = $bookingLocation;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: env("APP_NAME"),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-state',
            with: [
                'userName' => $this->full_name,
                'bookingStatus' => $this->bookingStatus,
            ],
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
