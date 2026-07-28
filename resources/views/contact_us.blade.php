@extends('layouts.guest')
@section('title', 'Vietnam Dental Care | Contact us')
@section('description', 'Vietnam Dental Care specializes in dental implants, orthodontics, porcelain crowns, veneers, teeth whitening, and comprehensive dental care with advanced technology and personalized treatment.')

@section('schema')
    @verbatim
        <script type="application/ld+json">
            {
            "@context":"https://schema.org",
            "@type":"WebPage",
            "url":"https://vietnamdentalcare.vn/contact-us",
            "name":"Vietnam Dental Care | Contact us",
            "description":"Vietnam Dental Care specializes in dental implants, orthodontics, porcelain crowns, veneers, teeth whitening, and comprehensive dental care with advanced technology and personalized treatment.",
            "breadcrumb":{
            "@id":"https://vietnamdentalcare.vn/#breadcrumb"
            },
            "isPartOf":{
            "@id":"https://vietnamdentalcare.vn/#website"
            }
            }
        </script>
    @endverbatim
@endsection

@section('content')

    @include('layouts.partials.breadcrumb', ['title' => __('home.contact_us') ])

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <!-- Contact Us Social Links Start -->
                    <div class="contact-us-form">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ __('home.contact.sub_title') }}</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('home.contact.title') }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">{{ __('home.contact.desc') }}</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Social Links Start -->
                        <div class="contact-social-links wow fadeInUp" data-wow-delay="0.4s" style="margin-top: 30px;">
                            <div style="display: flex; flex-direction: column; gap: 15px;">
                                {{-- Facebook --}}
                                <a href="https://facebook.com" target="_blank" style="display: flex; align-items: center; gap: 16px; padding: 14px 20px; border: 1px solid #e2e8f0; border-radius: 12px; text-decoration: none; background-color: #ffffff; transition: all 0.3s ease;">
                                    <div style="width: 48px; height: 48px; border-radius: 50%; background-color: #1877f2; display: flex; align-items: center; justify-content: center; color: #ffffff; font-size: 20px; flex-shrink: 0;">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </div>
                                    <div>
                                        <span style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: #64748b; letter-spacing: 0.5px;">
                                            {{ __('home.contact.follow_us') }}
                                        </span>
                                        <strong style="font-size: 16px; font-weight: 600; color: #1e293b; margin: 0;">Facebook</strong>
                                    </div>
                                </a>

                                {{-- TikTok --}}
                                <a href="https://tiktok.com" target="_blank" style="display: flex; align-items: center; gap: 16px; padding: 14px 20px; border: 1px solid #e2e8f0; border-radius: 12px; text-decoration: none; background-color: #ffffff; transition: all 0.3s ease;">
                                    <div style="width: 48px; height: 48px; border-radius: 50%; background-color: #000000; display: flex; align-items: center; justify-content: center; color: #ffffff; font-size: 20px; flex-shrink: 0;">
                                        <i class="fa-brands fa-tiktok"></i>
                                    </div>
                                    <div>
                                        <span style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: #64748b; letter-spacing: 0.5px;">
                                            {{ __('home.contact.watch_us') }}
                                        </span>
                                        <strong style="font-size: 16px; font-weight: 600; color: #1e293b; margin: 0;">TikTok</strong>
                                    </div>
                                </a>

                                {{-- Instagram --}}
                                <a href="https://instagram.com" target="_blank" style="display: flex; align-items: center; gap: 16px; padding: 14px 20px; border: 1px solid #e2e8f0; border-radius: 12px; text-decoration: none; background-color: #ffffff; transition: all 0.3s ease;">
                                    <div style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); display: flex; align-items: center; justify-content: center; color: #ffffff; font-size: 20px; flex-shrink: 0;">
                                        <i class="fa-brands fa-instagram"></i>
                                    </div>
                                    <div>
                                        <span style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; color: #64748b; letter-spacing: 0.5px;">
                                            {{ __('home.contact.follow_us') }}
                                        </span>
                                        <strong style="font-size: 16px; font-weight: 600; color: #1e293b; margin: 0;">Instagram</strong>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Social Links End -->
                    </div>
                    <!-- Contact Us Social Links End -->
                </div>

                <div class="col-xl-6">
                    <!-- Contact Image Box Start -->
                    <div class="contact-image-box">
                        <!-- Contact Us Image Start -->
                        <div class="contact-us-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/images/contact-us-img.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- Contact Us Image End -->

                        <!-- Contact Info List Start -->
                        <div class="contact-info-list">
                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icon-phone-white.svg') }}" alt="">
                                </div>
                                <div class="contact-info-content">
                                    <h3>{{ __('home.info.phone') }}</h3>
                                    <p><a href="tel:+84799108727">+(84) 799 108 727</a></p>
                                </div>
                            </div>

                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icon-mail-white.svg') }}" alt="">
                                </div>
                                <div class="contact-info-content">
                                    <h3>{{ __('home.info.email') }}</h3>
                                    <p><a href="mailto:support@vietnamdentalcare.vn">support@vietnamdentalcare.vn</a></p>
                                </div>
                            </div>

                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item location-info-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icon-location-white.svg') }}" alt="">
                                </div>
                                <div class="contact-info-content">
                                    <h3>{{ __('home.info.location') }}</h3>
                                    <p>{{ __('home.address') }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Info List End -->
                    </div>
                    <!-- Contact Image Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Google Map Start -->
    <div class="google-map">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Google Map Start -->
                    <div class="google-map-iframe">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31354.275639276777!2d106.71193441452407!3d10.789511976249266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f511d8bc583%3A0x25f5b4e408960187!2zQW4gS2jDoW5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1785231276211!5m2!1svi!2s"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    </div>
                    <!-- Google Map End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map End --> 
@endsection