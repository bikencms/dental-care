<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('booking.subject') }}</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8fafc; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased;">

    <!-- Wrapper Table -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; background-color: #f8fafc; padding: 20px 0;">
        <tr>
            <td align="center">
                
                <!-- Main Container -->
                <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); border: 1px solid #e2e8f0;">
                    
                    <!-- HEADER SECTION -->
                    <tr>
                        <td align="center" style="background-color: #0f172a; padding: 30px 20px;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 22px; font-weight: 700; letter-spacing: 0.5px;">{{ __('booking.title') }}</h1>
                            <p style="color: #94a3b8; margin: 5px 0 0 0; font-size: 13px; text-transform: uppercase; letter-spacing: 1px;">{{ __('booking.subtitle') }}</p>
                        </td>
                    </tr>

                    <!-- BODY CONTENT -->
                    <tr>
                        <td style="padding: 40px 30px; color: #334155; font-size: 16px; line-height: 1.6;">
                            
                            <!-- Greeting -->
                            <p style="margin-top: 0; font-weight: 600; color: #0f172a; font-size: 18px;">
                                {{ __('booking.dear', ['name' => $appointment->fullname ?? 'Valued Guest']) }}
                            </p>
                            
                            <p style="margin-bottom: 20px;">{!! __('booking.thank_you') !!}</p>
                            
                            <p style="margin-bottom: 20px;">
                                {!! __('booking.profile_received', ['treatment' => $treatmentName ?? 'Dental Implants / Porcelain Veneers']) !!}
                            </p>
                            
                            <p style="margin-bottom: 30px;">{{ __('booking.system_matched') }}</p>

                            <!-- CALL TO ACTION BOX -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f0f9ff; border-left: 4px solid #0284c7; border-radius: 4px; margin-bottom: 30px;">
                                <tr>
                                    <td style="padding: 20px;">
                                        <h3 style="margin: 0 0 8px 0; color: #0369a1; font-size: 16px;">{{ __('booking.cta_title') }}</h3>
                                        <p style="margin: 0; font-size: 14px; color: #475569;">{{ __('booking.cta_desc') }}</p>
                                    </td>
                                </tr>
                            </table>
                            @php
                                $portalUrl = localized_route('clinics.index', [ 'token'  => $appointment->token ]);
                            @endphp
                            <!-- LARGE BUTTON -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 30px;">
                                <tr>
                                    <td align="center">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center" bgcolor="#0284c7" style="border-radius: 8px;">
                                                    <a href="{{ $portalUrl ?? '#' }}" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 14px 28px; border-radius: 8px; border: 1px solid #0284c7; display: inline-block; font-weight: bold; background-color: #0284c7; box-shadow: 0 2px 4px rgba(2, 132, 199, 0.2);">
                                                        {{ __('booking.btn_view_clinics') }} &rarr;
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="font-size: 12px; color: #94a3b8; margin: 10px 0 0 0;">
                                            {!! __('booking.cta_fallback', ['link' => '<a href="' . ($portalUrl ?? '#') . '" style="color: #0284c7; word-break: break-all;">' . ($portalUrl ?? '#') . '</a>']) !!}
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <!-- WHAT HAPPENS NEXT SECTION -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-top: 1px solid #e2e8f0; padding-top: 25px; margin-bottom: 25px;">
                                <tr>
                                    <td>
                                        <h3 style="color: #0f172a; font-size: 16px; margin-top: 0; margin-bottom: 15px;">{{ __('booking.next_steps_title') }}</h3>
                                        
                                        <!-- Step 1 -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 12px;">
                                            <tr>
                                                <td width="24" valign="top" style="color: #0284c7; font-weight: bold; font-size: 14px;">1.</td>
                                                <td style="font-size: 14px; color: #334155;"><strong>{{ __('booking.step_1_strong') }}</strong> {!! __('booking.step_1_desc') !!}</td>
                                            </tr>
                                        </table>

                                        <!-- Step 2 -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 12px;">
                                            <tr>
                                                <td width="24" valign="top" style="color: #0284c7; font-weight: bold; font-size: 14px;">2.</td>
                                                <td style="font-size: 14px; color: #334155;"><strong>{{ __('booking.step_2_strong') }}</strong> {{ __('booking.step_2_desc') }}</td>
                                            </tr>
                                        </table>

                                        <!-- Step 3 -->
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td width="24" valign="top" style="color: #0284c7; font-weight: bold; font-size: 14px;">3.</td>
                                                <td style="font-size: 14px; color: #334155;"><strong>{{ __('booking.step_3_strong') }}</strong> {{ __('booking.step_3_desc') }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- SUPPORT CONTACT -->
                            <p style="margin-bottom: 20px; font-size: 15px;">
                                {{ __('booking.assistance') }} <a href="{{ $whatsappUrl ?? 'https://wa.me/+84799108727' }}" target="_blank" style="color: #16a34a; font-weight: bold; text-decoration: none;">{{ __('booking.whatsapp_btn') }}</a>
                            </p>

                            <!-- SIGN OFF -->
                            <p style="margin-bottom: 0; color: #0f172a; font-weight: 600;">{{ __('booking.warm_regards') }}</p>
                            <p style="margin-top: 4px; margin-bottom: 0; color: #0284c7; font-weight: bold;">{{ __('booking.team_name') }}</p>
                            <p style="margin-top: 2px; font-size: 13px; color: #64748b;">{{ __('booking.team_tagline') }}</p>

                        </td>
                    </tr>

                    <!-- FOOTER SECTION -->
                    <tr>
                        <td align="center" style="background-color: #f1f5f9; padding: 20px; border-top: 1px solid #e2e8f0; font-size: 12px; color: #64748b;">
                            <p style="margin: 0 0 5px 0;">
                                <a href="{{ config('app.url') }}" target="_blank" style="color: #0284c7; text-decoration: none; font-weight: 600;">{{ config('app.url') }}</a> 
                                &nbsp;|&nbsp; 
                                <a href="{{ $whatsappUrl ?? '#' }}" target="_blank" style="color: #0284c7; text-decoration: none; font-weight: 600;">Hotline / WhatsApp</a>
                            </p>
                            <p style="margin: 0; color: #94a3b8;">{!! __('booking.rights', ['year' => date('Y')]) !!}</p>
                        </td>
                    </tr>

                </table>
                <!-- End Main Container -->

            </td>
        </tr>
    </table>

</body>
</html>