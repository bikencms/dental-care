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

        @include('layouts.partials.header')

        @yield('content')

        @include('layouts.partials.footer')


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