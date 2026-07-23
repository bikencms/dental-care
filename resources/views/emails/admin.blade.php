<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Online Appointment</title>
</head>
<body style="margin:0;padding:0;background:#f5f5f5;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f5f5f5;padding:30px 0;">
    <tr>
        <td align="center">

            <table width="650" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;">

                <!-- Header -->
                <tr>
                    <td style="background:#0d6efd;padding:25px;text-align:center;">
                        <h2 style="margin:0;color:#ffffff;">
                            New Online Appointment
                        </h2>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding:30px;">

                        <p style="font-size:16px;">
                            A new online appointment request has been submitted via
                            <strong>Vietnam Dental Care</strong>.
                        </p>

                        <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">

                            <tr>
                                <td width="180" style="background:#f8f9fa;border:1px solid #dee2e6;">
                                    <strong>Full Name</strong>
                                </td>
                                <td style="border:1px solid #dee2e6;">
                                    {{ $appointment->fullname }}
                                </td>
                            </tr>

                            <tr>
                                <td style="background:#f8f9fa;border:1px solid #dee2e6;">
                                    <strong>Email</strong>
                                </td>
                                <td style="border:1px solid #dee2e6;">
                                    {{ $appointment->email }}
                                </td>
                            </tr>

                            <tr>
                                <td style="background:#f8f9fa;border:1px solid #dee2e6;">
                                    <strong>Phone</strong>
                                </td>
                                <td style="border:1px solid #dee2e6;">
                                    {{ $appointment->phone }}
                                </td>
                            </tr>

                            <tr>
                                <td style="background:#f8f9fa;border:1px solid #dee2e6;">
                                    <strong>Interest</strong>
                                </td>
                                <td style="border:1px solid #dee2e6;">
                                    @if(is_array($appointment->interest))
                                        {{ implode(', ', $appointment->interest) }}
                                    @else
                                        {{ $appointment->interest }}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td style="background:#f8f9fa;border:1px solid #dee2e6;">
                                    <strong>Brief Description</strong>
                                </td>
                                <td style="border:1px solid #dee2e6;">
                                    {!! nl2br(e($appointment->briefly)) !!}
                                </td>
                            </tr>

                            <tr>
                                <td style="background:#f8f9fa;border:1px solid #dee2e6;">
                                    <strong>Language</strong>
                                </td>
                                <td style="border:1px solid #dee2e6;">
                                    {{ strtoupper($appointment->language) }}
                                </td>
                            </tr>

                            <tr>
                                <td style="background:#f8f9fa;border:1px solid #dee2e6;">
                                    <strong>Status</strong>
                                </td>
                                <td style="border:1px solid #dee2e6;">
                                    {{ ucfirst($appointment->status) }}
                                </td>
                            </tr>

                            <tr>
                                <td style="background:#f8f9fa;border:1px solid #dee2e6;">
                                    <strong>Submitted At</strong>
                                </td>
                                <td style="border:1px solid #dee2e6;">
                                    {{ $appointment->created_at->format('d/m/Y H:i') }}
                                </td>
                            </tr>

                        </table>

                        <p style="margin-top:30px;font-size:15px;">
                            Please contact the patient as soon as possible to confirm the appointment.
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#f8f9fa;padding:20px;text-align:center;color:#888;font-size:13px;">
                        This email was automatically generated by the
                        <strong>Vietnam Dental Care</strong> website.
                        <br><br>
                        © {{ date('Y') }} Vietnam Dental Care. All rights reserved.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
```
