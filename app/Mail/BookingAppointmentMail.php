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

class BookingAppointmentMail extends Mailable
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
        $sub =  $this->appointment->fullname . ', your dental recommendations in Vietnam are ready! 🦷';
        if ( $this->appointment->language == 'vi' ) {
            $sub = $this->appointment->fullname . ', danh sách phòng khám nha khoa đề xuất cho bạn tại Việt Nam đã sẵn sàng! 🦷';
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
            view: 'emails.booking-appointment',
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
