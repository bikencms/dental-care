<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <meta name="description" content="@yield('description', 'Vietnam Dental Care provides world-class dental services in Vietnam, including dental implants, orthodontics, veneers, crowns, teeth whitening, and general dentistry. Experience personalized care, advanced technology, and affordable treatment for local and international patients.')">
        <meta name="keywords" content="Vietnam Dental Care, dental clinic Vietnam, dental implants Vietnam, cosmetic dentistry, orthodontics, braces, porcelain veneers, dental crowns, teeth whitening, smile makeover, oral surgery, affordable dental care, international dental clinic, Ho Chi Minh dental clinic">
        <meta name="author" content="Minh Biken">
        <!-- Page Title -->
        <title>@yield('title', 'Vietnam Dental Care | Trusted Dental Clinic for International Patients')</title>
        <!-- Favicon Icon -->
        <link rel="shortcut icon" type="image/x-icon" href="https://vietnamdentalcare.vn/assets/images/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="https://vietnamdentalcare.vn/assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://vietnamdentalcare.vn/assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://vietnamdentalcare.vn/assets/images/favicon-16x16.png">
        <link rel="manifest" href="{{ asset('assets/images/site.webmanifest') }}">


        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Vietnam Dental Care">
        <meta property="og:title" content="Vietnam Dental Care | Dental Implants, Braces & Cosmetic Dentistry in Vietnam">
        <meta property="og:description" content="Premium dental care in Vietnam with experienced dentists, advanced technology, and affordable treatment for local and international patients.">
        <meta property="og:url" content="https://vietnamdentalcare.vn">
        <meta property="og:image" content="https://vietnamdentalcare.vn/assets/images/og-image.png">
        <meta property="og:locale" content="en_US">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Vietnam Dental Care | Dental Implants & Cosmetic Dentistry">
        <meta name="twitter:description" content="Advanced dental treatments in Vietnam for local and international patients.">
        <meta name="twitter:image" content="https://vietnamdentalcare.vn/assets/images/og-image.jpg">

        @if(app()->getLocale() == 'vi')
            <link rel="canonical" href="https://vietnamdentalcare.vn/vi">
        @else
            <link rel="canonical" href="https://vietnamdentalcare.vn">
        @endif


        <link rel="alternate" hreflang="en" href="https://vietnamdentalcare.vn/">
        <link rel="alternate" hreflang="vi" href="https://vietnamdentalcare.vn/vi">
        <link rel="alternate" hreflang="x-default" href="https://vietnamdentalcare.vn/">

        <meta name="robots" content="index, follow, max-image-preview:large">

        <!-- Google Fonts Css-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
        <!-- SlickNav Css -->
        <link href="{{ asset('assets/css/slicknav.min.css') }}" rel="stylesheet">
        <!-- Swiper Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
        <!-- Font Awesome Icon Css-->
        <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" media="screen">
        <!-- Animated Css -->
        <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
        <!-- Magnific Popup Core Css File -->
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <!-- Image Comparision Css File -->
        <link rel="stylesheet" href="{{ asset('assets/css/twentytwenty.css') }}">
        <!-- Mouse Cursor Css File -->
        <link rel="stylesheet" href="{{ asset('assets/css/mousecursor.css') }}">
        <!-- Main Custom Css -->
        <link href="{{ asset('assets/css/custom.css') }}?v={{ filemtime(public_path('assets/css/custom.css')) }}" rel="stylesheet" media="screen">

        @verbatim
            <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": ["Dentist", "MedicalClinic"],
                    "@id": "https://vietnamdentalcare.vn/#clinic",
                    "name": "Vietnam Dental Care",
                    "url": "https://vietnamdentalcare.vn",
                    "image": "https://vietnamdentalcare.vn/assets/images/logo.png",
                    "logo": "https://vietnamdentalcare.vn/assets/images/logo.png",
                    "description": "Vietnam Dental Care is a trusted dental clinic providing dental implants, orthodontics, cosmetic dentistry, teeth whitening, porcelain veneers, crowns, and comprehensive oral healthcare for local and international patients.",
                    "telephone": "+84 799 108 727",
                    "email": "support@vietnamdentalcare.vn",
                    "priceRange": "$$",
                    "currenciesAccepted": "VND, USD",
                    "paymentAccepted": [
                        "Cash",
                        "Credit Card",
                        "Visa",
                        "MasterCard",
                        "Bank Transfer"
                    ],

                    "address": {
                        "@type": "PostalAddress",
                        "streetAddress": "Nguyễn Huệ, Sài Gòn, Hồ Chí Minh, Việt Nam",
                        "addressLocality": "Ho Chi Minh City",
                        "addressRegion": "Ho Chi Minh",
                        "postalCode": "700000",
                        "addressCountry": "VN"
                    },

                    "geo": {
                        "@type": "GeoCoordinates",
                        "latitude": 10.8041105,
                        "longitude": 106.6376424
                    },

                    "openingHoursSpecification": [
                        {
                        "@type": "OpeningHoursSpecification",
                        "dayOfWeek": [
                            "Monday",
                            "Tuesday",
                            "Wednesday",
                            "Thursday",
                            "Friday",
                            "Saturday"
                        ],
                        "opens": "08:00",
                        "closes": "20:00"
                        },
                        {
                        "@type": "OpeningHoursSpecification",
                        "dayOfWeek": "Sunday",
                        "opens": "08:00",
                        "closes": "17:00"
                        }
                    ],

                    "areaServed": [
                        {
                        "@type": "Country",
                        "name": "Vietnam"
                        },
                        {
                        "@type": "Country",
                        "name": "Australia"
                        },
                        {
                        "@type": "Country",
                        "name": "United States"
                        },
                        {
                        "@type": "Country",
                        "name": "Canada"
                        }
                    ],

                    "availableLanguage": [
                        "Vietnamese",
                        "English"
                    ],

                    "medicalSpecialty": [
                        "Dentistry",
                        "Orthodontics",
                        "Dental Implantology",
                        "Cosmetic Dentistry",
                        "Oral Surgery"
                    ],
                }
            </script>

            <script type="application/ld+json">
                {
                    "@context":"https://schema.org",
                    "@type":"Organization",
                    "@id":"https://vietnamdentalcare.vn/#organization",
                    "name":"Vietnam Dental Care",
                    "url":"https://vietnamdentalcare.vn",
                    "logo":"https://vietnamdentalcare.vn/images/logo.png",
                    "email":"support@vietnamdentalcare.vn",
                    "telephone":"+84 799 108 727"
                }
            </script>

            <script type="application/ld+json">
                {
                    "@context":"https://schema.org",
                    "@type":"BreadcrumbList",
                    "itemListElement":[
                        {
                        "@type":"ListItem",
                        "position":1,
                        "name":"Home",
                        "item":"https://vietnamdentalcare.vn"
                        },
                        {
                        "@type":"ListItem",
                        "position":2,
                        "name":"About us",
                        "item":"https://vietnamdentalcare.vn/about-us"
                        }
                    ]
                }
            </script>
        @endverbatim
        
        @yield('schema')

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-WW5QE0C4KM"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-WW5QE0C4KM');
        </script>
    </head>
    <body>
        <!-- Preloader Start -->
        <div class="preloader">
            <div class="loading-container">
                <div class="loading"></div>
                <div id="loading-icon"><img src="{{ asset('assets/images/icon.png') }}" alt=""></div>
            </div>
        </div>
        <!-- Preloader End -->

        <!-- Header Start -->
        <header class="main-header">
            <div class="header-sticky bg-section">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <!-- Logo Start -->
                        <a class="navbar-brand" href="{{ localized_route('home') }}">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="185">
                        </a>
                        <!-- Logo End -->

                        <!-- Main Menu Start -->
                        <div class="collapse navbar-collapse main-menu">
                            <div class="nav-menu-wrapper">
                                <ul class="navbar-nav mr-auto" id="menu">
                                    <!-- Home Menu -->
                                    <li class="nav-item">
                                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['home', 'locale.home']) ? 'active' : '' }}" 
                                            href="{{ localized_route('home') }}">
                                            {{ __('about.home') ?? 'Home' }}
                                        </a>
                                    </li>                                        

                                    <!-- About Us Menu -->
                                    <li class="nav-item">
                                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['about-us', 'locale.about-us']) ? 'active' : '' }}" 
                                            href="{{ localized_route('about-us') }}">
                                            {{ __('home.about_us') ?? 'About Us' }}
                                        </a>
                                    </li>

                                    <!-- Contact Us Menu -->
                                    <li class="nav-item">
                                        <a class="nav-link {{ in_array(Route::currentRouteName(), ['contact-us', 'locale.contact-us']) ? 'active' : '' }}" 
                                            href="{{ localized_route('contact-us') }}">
                                            {{ __('home.contact_us') ?? 'Contact Us' }}
                                        </a>
                                    </li>

                                    <!-- Language Dropdown Switcher -->
                                    <li class="nav-item submenu">
                                        <a class="nav-link" href="#">
                                            @if(app()->getLocale() == 'vi')
                                                <img src="{{ asset('assets/images/svg/vn.svg') }}" alt="Language VI" width="18">
                                            @else
                                                <img src="{{ asset('assets/images/svg/us.svg') }}" alt="Language EN" width="18">
                                            @endif
                                        </a>
                                        <ul class="language">                                        
                                            <!-- Tiếng Anh (Default) -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ switch_locale_url('en') }}">
                                                    <img src="{{ asset('assets/images/svg/us.svg') }}" alt="Language EN" width="18">
                                                </a>
                                            </li>
                                            <!-- Tiếng Việt -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ switch_locale_url('vi') }}">
                                                    <img src="{{ asset('assets/images/svg/vn.svg') }}" alt="Language VN" width="18"> 
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <!-- Header Btn Start -->
                            <div class="header-btn">
                                <a class="btn-default" href="#appointmentForm">{{ __('home.button') }}</a>
                            </div>
                            <!-- Header Btn End -->                      
                        </div>
                        <!-- Main Menu End -->
                        <div class="navbar-toggle"></div>
                    </div>
                </nav>
                <div class="responsive-menu"></div>
            </div>
        </header>
        <!-- Header End -->

        @yield('content')

        <!-- Footer Start -->
        <footer class="main-footer bg-section dark-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Footer About Start -->
                        <div class="footer-about">
                            <!-- Footer Logo Start -->
                            <div class="footer-logo">
                                <img src="{{ asset('assets/images/footer_logo.png') }}" alt="">
                            </div>
                            <!-- Footer Logo End -->

                            <!-- About Footer Content Start -->
                            <div class="about-footer-content">
                                <p>{{ __('home.footer_title') }}</p>
                            </div>           
                            <!-- About Footer Content End -->
                                
                            <!-- Footer Social Link Start -->
                            <div class="footer-social-links">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- Footer Social Link End -->
                        </div>
                        <!-- Footer About End -->
                    </div>

                    <div class="col-xl-8">
                    <!-- Footer Links Box Start -->
                    <div class="footer-links-box">
                        <!-- Footer Links Start -->
                        <div class="footer-links">
                            <h3>{{ __('home.quick_links') }}</h3>
                            <ul>
                                <li><a href="{{ localized_route('home') }}">{{ __('home.home') }}</a></li>
                                <li><a href="{{ localized_route('about-us') }}">{{ __('home.about_us') }}</a></li>
                                <li><a href="{{ localized_route('contact-us') }}">{{ __('home.contact_us') }}</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->

                        <!-- Footer Links Start -->
                        <div class="footer-links">
                            <h3>{{ __('home.support') }}</h3>
                            <ul>
                                <li><a href="#">{{ __('home.terms_condition') }}</a></li>
                                <li><a href="#">{{ __('home.privacy_policy') }}</a></li>
                                <li><a href="{{ localized_route('contact-us') }}">{{ __('home.contact_us') }}</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->

                        <!-- Footer Links Start -->
                        <div class="footer-links footer-contact-links">
                            <h3>{{ __('home.contact_us') }}</h3>
                            <!-- Footer Contact Box Start -->
                            <div class="footer-contact-box">
                                <div class="footer-contact-box-title">
                                    <h3><a class="fontsize13" href="mailto:support@vietnamdentalcare.vn">support@vietnamdentalcare.vn</a></h3>
                                    <h3><a class="fontsize14" href="tel:+84799108727">+84 799 108 727</a></h3>
                                </div>
                                <div class="footer-contact-box-hour">
                                    <p>{{ __('home.working_hours') }} <span>{{ __('home.hours_detail') }}</span></p>
                                </div>
                            </div>
                            <!-- Footer Contact Box End -->
                        </div>
                        <!-- Footer Links End -->
                    </div>
                    <!-- Footer Links Box End -->
                </div>

                <div class="col-lg-12">
                    <!-- Footer Copyright Text Start -->
                    <div class="footer-copyright-text">
                        <p>{{ __('home.copyright1', ['year' => date('Y')]) }}</p>
                    </div>
                    <!-- Footer Copyright Text End -->
                </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- Jquery Library File -->
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <!-- Bootstrap js file -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- Validator js file -->
        <script src="{{ asset('assets/js/validator.min.js') }}"></script>
        <!-- SlickNav js file -->
        <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
        <!-- Swiper js file -->
        <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
        <!-- Counter js file -->
        <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
        <!-- Magnific js file -->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- SmoothScroll -->
        <script src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
        <!-- Parallax js -->
        <script src="{{ asset('assets/js/parallaxie.js') }}"></script>
        <!-- Image Comparision js -->
        <script src="{{ asset('assets/js/jquery.event.move.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.twentytwenty.js') }}"></script>
        <!-- MagicCursor js file -->
        <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
        <script src="{{ asset('assets/js/magiccursor.js') }}"></script>
        <!-- Text Effect js file -->
        <script src="{{ asset('assets/js/SplitText.min.js') }}"></script>
        <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
        <!-- YTPlayer js File -->
        <script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
        <!-- Wow js file -->
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <!-- Main Custom js file -->
        <script src="{{ asset('assets/js/function.js') }}"></script>

        {{-- Chèn Widget WhatsApp --}}
        <!-- Elfsight WhatsApp Chat | Untitled WhatsApp Chat -->
        <script src="https://elfsightcdn.com/platform.js" async></script>
        <div class="elfsight-app-9349fbbd-7502-45cc-b49a-1fa2d4ead97c" data-elfsight-app-lazy></div>

        @stack('scripts')
        
    </body>
</html>