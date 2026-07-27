<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\OnlineAppointment;
use Illuminate\Mail\Mailables\Address;
class PreConsultationMail extends Mailable
{
    use Queueable, SerializesModels;

    public OnlineAppointment $appointment;

    /**
     * Create a new message instance.
     */
    public function __construct(OnlineAppointment $appointment)
    {
         $this->appointment = $appointment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $sub = 'Action Required: Guide to Obtaining Your Dental X-ray for VDC';
        if ( $this->appointment->language == 'vi' ) {
            $sub = 'Cần hành động: Hướng dẫn lấy phim X-quang nha khoa cho hồ sơ VDC';
        }
        return new Envelope(
            from: new Address('support@vietnamdentalcare.vn', 'Support - VDC Care'),
            subject: $sub,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.pre-consultation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
