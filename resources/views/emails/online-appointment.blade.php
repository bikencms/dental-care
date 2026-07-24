<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('mail.title') }}</title>
</head>
<body style="margin:0;padding:0;background:#f3f8fc;font-family:Sora, sans-serif;font-size: 16px;font-weight: 400;">

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f3f8fc;padding:40px 15px;">
    <tr>
        <td align="center">

            <table role="presentation" width="650" cellpadding="0" cellspacing="0"
                   style="background:#ffffff;border-radius:14px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,.08);">

                <!-- Header -->
                <tr>
                    <td align="center"
                        style="background:linear-gradient(135deg,#274289,#1d233b);padding:35px;">

                        <img src="{{ config('app.url') }}/assets/images/footer_logo.png"
                             alt="Vietnam Dental Care"
                             style="max-width:180px;margin-bottom:20px;">

                        <h1 style="margin:0;color:#ffffff;font-size:28px;font-weight:bold;">
                            {{ __(key: 'home.title') }}
                        </h1>

                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:45px;line-height:1.8;color:#444;">
                        <h2 style="color: #1d233b">
                            {{ __('mail.title_head') }},
                        </h2>
                        <p>
                            {{ __('mail.des1') }}
                        </p>
                        <p>
                            {{ __('mail.des2') }}
                        </p>
                        <table role="presentation"
                               width="100%"
                               cellpadding="0"
                               cellspacing="0"
                               style="margin:30px 0;background:#eef7ff;border-left:5px solid #1d233b;border-radius:8px;">
                            <tr>
                                <td style="padding:20px;color:#444;">
                                    {{ __('mail.des3') }}
                                </td>
                            </tr>
                        </table>
                        <p>
                            {{ __('mail.des4') }}
                        </p>
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" style="margin:35px auto;">
                            <tr>
                                <td align="center"
                                    bgcolor="#1d233b"
                                    style="border-radius:50px;">
                                    @if( $appointment->language == 'vi' )
                                        <a href="{{ route('locale.consultation', [ 'token'  => $appointment->token, 'locale' => $appointment->language ]) }}"
                                            style="
                                                    display:inline-block;
                                                    padding:16px 40px;
                                                    color:#ffffff;
                                                    text-decoration:none;
                                                    font-size:16px;
                                                    font-weight:bold;">
                                                {{ __('mail.button') }}
                                        </a>
                                    @else
                                        <a href="{{ route('consultation', [ 'token'  => $appointment->token, 'locale' => $appointment->language ]) }}"
                                            style="
                                                    display:inline-block;
                                                    padding:16px 40px;
                                                    color:#ffffff;
                                                    text-decoration:none;
                                                    font-size:16px;
                                                    font-weight:bold;">
                                                {{ __('mail.button') }}
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        </table>

                        <p style="margin-top:35px;">
                            {{ __('mail.note') }}:
                        </p>

                        <p style="word-break:break-all;color:#1A76D2;font-size:14px;">
                            @if( $appointment->language == 'vi' )
                                <a href="{{ route('locale.consultation', [ 'token'  => $appointment->token, 'locale' => $appointment->language ]) }}">
                                    {{ __('mail.button') }}
                                </a>
                            @else
                                <a href="{{ route('consultation', [ 'token'  => $appointment->token, 'locale' => $appointment->language ]) }}">
                                    {{ __('mail.button') }}
                                </a>
                            @endif
                        </p>

                        <hr style="border:none;border-top:1px solid #e6e6e6;margin:40px 0;">

                        <p style="margin-bottom:5px;">
                            {{ __('mail.des5') }}
                        </p>

                        <p style="margin-top:0;">
                            {{ __('mail.des6') }},
                        </p>

                        <p style="margin:0;font-weight:bold;color:#1d233b;">
                            Kathy, {{ __('mail.team') }}
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td align="center"
                        style="background:#1d233b;padding:30px;color:#ffffff;">

                        <h3 style="margin-top:0;color:#ffffff;">
                            {{ __(key: 'home.title') }}
                        </h3>

                        <p style="margin:8px 0;font-size:14px;">
                            {{ __(key: 'home.description') }}
                        </p>

                        <p style="margin:8px 0;font-size:14px;color:#ffffff;">
                            🌐 https://vietnamdentalcare.vn
                        </p>

                        <p style="margin:8px 0;font-size:14px;color:#ffffff;">
                            ✉️ support@vietnamdentalcare.vn
                        </p>

                        <p style="margin-top:25px;font-size:12px;color:#d5e6ff;">
                            © {{ date('Y') }} {{ __(key: 'home.title') }}.
                            {{ __(key: 'home.copyright') }}
                        </p>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
```
