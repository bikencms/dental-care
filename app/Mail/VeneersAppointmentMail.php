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

class VeneersAppointmentMail extends Mailable
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
        $sub = 'Let\'s Design Your Dream Smile: Prepare for Your Video Consultation';
        if ( $this->appointment->language == 'vi' ) {
            $sub = 'Cùng kiến tạo nụ cười mơ ước: Chuẩn bị cho buổi tư vấn trực tuyến của Quý khách';
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
            view: 'emails.veneers',
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
