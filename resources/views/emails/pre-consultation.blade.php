<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('pre-consultation.mail_subject') }}</title>
</head>
<body style="margin:0;padding:0;background:#f3f8fc;font-family:Sora, sans-serif;font-size: 16px;font-weight: 400;">

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f3f8fc;padding:40px 15px;">
    <tr>
        <td align="center">

            <table role="presentation" width="650" cellpadding="0" cellspacing="0"
                   style="background:#ffffff;border-radius:14px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,.08);">

                <!-- Header -->
                <tr>
                    <td align="center" style="background:linear-gradient(135deg,#274289,#1d233b);padding:35px;">
                        <img src="{{ config('app.url') }}/assets/images/footer_logo.png"
                             alt="Vietnam Dental Care"
                             style="max-width:180px;margin-bottom:20px;">

                        <h1 style="margin:0;color:#ffffff;font-size:26px;font-weight:bold;">
                            {{ __('pre-consultation.header_title') }}
                        </h1>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:45px;line-height:1.8;color:#444;">
                        
                        <!-- Greeting -->
                        <h2 style="color: #1d233b; margin-top:0;">
                            {{ __('pre-consultation.greeting') }} {{ $appointment->fullname ?? $customerName ?? '' }},
                        </h2>
                        
                        <p>{{ __('pre-consultation.intro') }}</p>
                        
                        <p>{{ __('pre-consultation.purpose') }}</p>

                        <!-- Note Box (Green highlight) -->
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                               style="margin:25px 0;background:#f0fdf4;border-left:5px solid #10b981;border-radius:8px;">
                            <tr>
                                <td style="padding:16px 20px;color:#065f46;font-size:14.5px;">
                                    <strong>{{ __('pre-consultation.note_title') }}</strong> 
                                    {!! __('pre-consultation.note_content', ['bold_start' => '<strong>', 'bold_end' => '</strong>']) !!}
                                </td>
                            </tr>
                        </table>

                        <!-- Steps -->
                        <h3 style="color:#1d233b;margin-top:30px;margin-bottom:15px;font-size:18px;">
                            {{ __('pre-consultation.steps_title') }}
                        </h3>

                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="top" width="35" style="padding-bottom: 12px;">
                                    <div style="background:#274289;color:#ffffff;border-radius:50%;width:26px;height:26px;text-align:center;line-height:26px;font-weight:bold;font-size:13px;">1</div>
                                </td>
                                <td style="padding-bottom: 12px;color:#444;">
                                    {{ __('pre-consultation.step_1') }}
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="35" style="padding-bottom: 12px;">
                                    <div style="background:#274289;color:#ffffff;border-radius:50%;width:26px;height:26px;text-align:center;line-height:26px;font-weight:bold;font-size:13px;">2</div>
                                </td>
                                <td style="padding-bottom: 12px;color:#444;">
                                    {{ __('pre-consultation.step_2') }}
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" width="35">
                                    <div style="background:#274289;color:#ffffff;border-radius:50%;width:26px;height:26px;text-align:center;line-height:26px;font-weight:bold;font-size:13px;">3</div>
                                </td>
                                <td style="color:#444;">
                                    {{ __('pre-consultation.step_3') }}
                                </td>
                            </tr>
                        </table>

                        <p style="margin-top:25px;">
                            {!! __('pre-consultation.after_steps', ['bold_start' => '<strong>', 'bold_end' => '</strong>']) !!}
                        </p>

                        <!-- Dentist Message Card -->
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                               style="margin:30px 0;background:#f8fafc;border:2px dashed #cbd5e1;border-radius:12px;">
                            <tr>
                                <td style="padding:22px;">
                                    <div style="text-align:center;margin-bottom:12px;">
                                        <span style="background:#e0f2fe;color:#0369a1;font-size:11px;font-weight:700;text-transform:uppercase;padding:4px 12px;border-radius:20px;letter-spacing:0.5px;">
                                            {{ __('pre-consultation.dentist_box_tag') }}
                                        </span>
                                    </div>
                                    
                                    <h4 style="margin:8px 0 14px 0;color:#1d233b;font-size:15px;text-align:center;">
                                        {{ __('pre-consultation.dentist_box_head') }}
                                    </h4>
                                    
                                    <div style="font-size:14px;line-height:1.7;color:#475569;font-style:italic;background:#ffffff;padding:16px;border-radius:8px;border:1px solid #e2e8f0;">
                                        {!! __('pre-consultation.dentist_box_body') !!}
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <!-- CTA Button -->
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" style="margin:35px auto;">
                            <tr>
                                <td align="center" bgcolor="#1d233b" style="border-radius:50px;">
                                    @if(isset($appointment) && !empty($appointment->language) && $appointment->language == 'vi')
                                        <a href="{{ route('locale.consultation', ['token' => $appointment->token, 'locale' => $appointment->language]) }}"
                                           style="display:inline-block;padding:16px 40px;color:#ffffff;text-decoration:none;font-size:16px;font-weight:bold;">
                                            {{ __('pre-consultation.btn_text') }}
                                        </a>
                                    @elseif(isset($appointment))
                                        <a href="{{ route('consultation', ['token' => $appointment->token]) }}"
                                           style="display:inline-block;padding:16px 40px;color:#ffffff;text-decoration:none;font-size:16px;font-weight:bold;">
                                            {{ __('pre-consultation.btn_text') }}
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        </table>

                        <p>{{ __('pre-consultation.support') }}</p>

                        <hr style="border:none;border-top:1px solid #e6e6e6;margin:30px 0;">

                        <p style="margin-bottom:5px;">{{ __('pre-consultation.warm_regards') }}</p>

                        <p style="margin:0;font-weight:bold;color:#1d233b;">
                            {{ $senderName ?? 'Kathy' }}, {{ __('pre-consultation.team') }}
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td align="center" style="background:#1d233b;padding:30px;color:#ffffff;">

                        <h3 style="margin-top:0;color:#ffffff;">
                            {{ __('home.title') }}
                        </h3>

                        <p style="margin:8px 0;font-size:14px;">
                            {{ __('home.description') }}
                        </p>

                        <p style="margin:8px 0;font-size:14px;color:#ffffff;">
                            🌐 https://vietnamdentalcare.vn
                        </p>

                        <p style="margin:8px 0;font-size:14px;color:#ffffff;">
                            ✉️ support@vietnamdentalcare.vn
                        </p>

                        <p style="margin-top:25px;font-size:12px;color:#d5e6ff;">
                            © {{ date('Y') }} {{ __('home.title') }}.
                            {{ __('home.copyright') }}
                        </p>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>