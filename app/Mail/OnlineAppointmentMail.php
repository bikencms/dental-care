<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\OnlineAppointment;

class OnlineAppointmentMail extends Mailable
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
        $sub = 'Prepare for Your Video Consultation with Our Specialists';
        if ( $this->appointment->language == 'vi' ) {
            $sub = 'Chuẩn bị trước buổi tư vấn trực tuyến với đội ngũ bác sĩ chuyên khoa';
        }
        return new Envelope(
            subject: $sub,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.online-appointment',
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
