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
        <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon-16x16.png">
        <link rel="manifest" href="./assets/images/site.webmanifest">


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
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <!-- SlickNav Css -->
        <link href="./assets/css/slicknav.min.css" rel="stylesheet">
        <!-- Swiper Css -->
        <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">
        <!-- Font Awesome Icon Css-->
        <link href="./assets/css/all.min.css" rel="stylesheet" media="screen">
        <!-- Animated Css -->
        <link href="./assets/css/animate.css" rel="stylesheet">
        <!-- Magnific Popup Core Css File -->
        <link rel="stylesheet" href="./assets/css/magnific-popup.css">
        <!-- Image Comparision Css File -->
        <link rel="stylesheet" href="./assets/css/twentytwenty.css">
        <!-- Mouse Cursor Css File -->
        <link rel="stylesheet" href="./assets/css/mousecursor.css">
        <!-- Main Custom Css -->
        <link href="./assets/css/custom.css?v={{ filemtime(public_path('assets/css/custom.css')) }}" rel="stylesheet" media="screen">

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
                    "telephone": "+84 0799 108 727",
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
                    "telephone":"+84 0799 108 727"
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
			<div id="loading-icon"><img src="./assets/images/icon.png" alt=""></div>
		</div>
	</div>
	<!-- Preloader End -->

    <!-- Header Start -->
	<header class="main-header">
		<div class="header-sticky bg-section">
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid">
					<!-- Logo Start -->
					<a class="navbar-brand" href="./">
						<img src="./assets/images/logo.png?Aaa" alt="Logo" width="185">
					</a>
					<!-- Logo End -->

					<!-- Main Menu Start -->
					<div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                                </li>                                
                                <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}" href="{{ route('about-us') }}">About Us</a>
                                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                                <li class="nav-item submenu">
                                    <a class="nav-link" href="#">
                                    @if(app()->getLocale() == 'vi')
                                        <img src="./assets/images/svg/vn.svg" alt="Language VI" width="18">
                                    @else
                                        <img src="./assets/images/svg/us.svg" alt="Language EN" width="18">
                                    @endif
                                    </a>
                                    <ul class="language">                                        
                                        <li class="nav-item"><a class="nav-link" href="/"><img src="./assets/images/svg/us.svg" alt="Language EN" width="18"></a></li>
                                        <li class="nav-item"><a class="nav-link" href="/vi"><img src="./assets/images/svg/vn.svg" alt="Language VN" width="18"></a></li>
                                    </ul>
                                </li>
                                <li class="nav-item highlighted-menu"><a class="nav-link" href="#"></a></li>
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

    <!-- Our Services Section Start -->
    <div class="our-services bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Our Specialized Services</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Expert solutions for your smile</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp">
                        <!-- Service Item Image Start -->
                        <div class="service-item-image">
                            <figure>
                                <img src="./assets/images/implant.png" alt="">
                            </figure>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Content Start -->
                        <div class="service-item-content">
                            <h3><a href="#">Porcelain Veneers – Instant Smile Transformation</a></h3>
                            <p>Correct discoloration, gaps, and misalignment. Achieve a radiant, natural-
looking smile in just 3–5 days.</p>
                        </div>
                        <!-- Hero Button Start -->
                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.6s">
                                <a href="#appointmentForm" class="btn-default btn-highlighted">Preview Your New Smile</a>
                            </div>
                        <!-- Hero Button End -->
                        <!-- Service Content End -->
                    </div>
                    <!-- Service Item End -->
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Service Item Image Start -->
                        <div class="service-item-image">
                            <figure>
                                <img src="./assets/images/service-item-image-4.png" alt="">
                            </figure>
                        </div>
                        <!-- Service Item Image End -->

                        <!-- Service Content Start -->
                        <div class="service-item-content">
                            <h3><a href="#">Dental Implants – Restore Your Bite, Restore Your Life</a></h3>
                            <p>Advanced implant technology for long-lasting, functional, and natural-
feeling results. The ultimate solution for tooth replacement.</p>
                        </div>
                         <!-- Hero Button Start -->
                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.6s">
                                <a href="#appointmentForm" class="btn-default btn-highlighted">Get Expert Advice</a>
                            </div>
                        <!-- Hero Button End -->
                        <!-- Service Content End -->
                    </div>
                    <!-- Service Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us bg-section dark-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Why choose us</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Why Choose Vietnam</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 order-1">
                    <!-- Why Choose Item List Start -->
                    <div class="why-choose-item-list">
                        <!-- Why Choose Item Start -->
                        <div class="why-choose-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box">
                                <img src="./assets/images/icon-why-choose-1.svg" alt="">
                            </div>
                            <div class="why-choose-item-content">
                                <h3>World-Class Excellence</h3>
                                <p>Modern Vietnamese dental clinics adhere to strict international standards,
utilizing the latest global technology.</p>
                            </div>
                        </div>
                        <!-- Why Choose Item End -->

                        <!-- Why Choose Item Start -->
                        <div class="why-choose-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="./assets/images/icon-why-choose-2.svg" alt="">
                            </div>
                            <div class="why-choose-item-content">
                                <h3>Unmatched Value</h3>
                                <p>Save up to 70% on premium dental treatments compared to back home,
without compromising on quality.</p>
                            </div>
                        </div>
                        <!-- Why Choose Item End -->
                    </div>
                    <!-- Why Choose Item List End -->
                </div>

                <div class="col-lg-4 order-lg-2 order-md-3 order-2">
                    <!-- Why Choose Image Start -->
                    <div class="why-choose-image wow fadeInUp" data-wow-delay="0.2s">
                        <figure>
                            <img src="./assets/images/why-choose-image.png" alt="">
                        </figure>
                    </div>
                    <!-- Why Choose Image End -->
                </div>

                <div class="col-lg-4 col-md-6 order-lg-2 order-md-2 order-3">
                    <!-- Why Choose Item List Start -->
                    <div class="why-choose-item-list">
                        <!-- Why Choose Item Start -->
                        <div class="why-choose-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon-box">
                                <img src="./assets/images/icon-why-choose-3.svg" alt="">
                            </div>
                            <div class="why-choose-item-content">
                                <h3>A Perfect Blend of Care &amp; Vacation</h3>
                                <p>Combine your smile transformation with a relaxing getaway in beautiful
Vietnam. Enjoy hospitality like nowhere else.</p>
                            </div>
                        </div>
                        <!-- Why Choose Item End -->

                        <!-- Why Choose Item Start -->
                        <div class="why-choose-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="./assets/images/icon-why-choose-4.svg" alt="">
                            </div>
                            <div class="why-choose-item-content">
                                <h3>Family-Friendly Environment</h3>
                                <p>We use advanced dental technology to ensure precise, safe, and comfortable treatments for every patient.</p>
                            </div>
                        </div>
                        <!-- Why Choose Item End -->
                    </div>
                    <!-- Why Choose Item List End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us Section End -->

    <!-- Our Transformation Section Start -->
    <div class="our-transformation">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">After/Before</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">See stunning smile transformation before and after</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Our Transformation Box Start -->
                    <div class="our-transformation-box tab-content wow fadeInUp" data-wow-delay="0.2s" id="myTabContent">
                        <!-- Sidebar Our Transformation Nav start -->
                        <div class="our-transformation-nav">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="one-tab" data-bs-toggle="tab" data-bs-target="#one" type="button" role="tab" aria-selected="true"><img src="./assets/images/icon-transformation-nav-1.svg" alt="">Invisalign Treatment</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="two-tab" data-bs-toggle="tab" data-bs-target="#two" type="button" role="tab" aria-selected="false"><img src="./assets/images/icon-transformation-nav-2.svg" alt="">Veneers & Bonding</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="three-tab" data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab" aria-selected="false"><img src="./assets/images/icon-transformation-nav-3.svg" alt="">Pediatric Transformations</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="four-tab" data-bs-toggle="tab" data-bs-target="#four" type="button" role="tab" aria-selected="false"><img src="./assets/images/icon-transformation-nav-4.svg" alt="">Teeth Whitening</button>
                                </li>
                            </ul>
                        </div>
                        <!-- Sidebar Our Transformation Nav End -->

                        <!-- Our Transformation Item Start -->
                        <div class="transformation-tab-item tab-pane fade show active" id="one" role="tabpanel">
                            <!-- Transformation Image Box Start -->
                            <div class="transformation-image-box">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-1.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-1.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-2.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-2.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-3.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-3.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Transformation Image Box End -->
                        </div>
                        <!-- Our Transformation Item End -->

                        <!-- Our Transformation Item Start -->
                        <div class="transformation-tab-item tab-pane fade" id="two" role="tabpanel">
                            <!-- Transformation Image Box Start -->
                            <div class="transformation-image-box">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-4.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-4.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-5.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-5.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-6.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-6.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Transformation Image Box End -->
                        </div>
                        <!-- Our Transformation Item End -->

                        <!-- Our Transformation Item Start -->
                        <div class="transformation-tab-item tab-pane fade" id="three" role="tabpanel">
                            <!-- Transformation Image Box Start -->
                            <div class="transformation-image-box">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-7.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-7.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-8.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-8.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-9.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-9.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Transformation Image Box End -->
                        </div>
                        <!-- Our Transformation Item End -->

                        <!-- Our Transformation Item Start -->
                        <div class="transformation-tab-item tab-pane fade" id="four" role="tabpanel">
                            <!-- Transformation Image Box Start -->
                            <div class="transformation-image-box">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-2.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-2.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-6.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-6.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="./assets/images/transformation-img-before-1.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-1.jpg" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Transformation Image Box End -->
                        </div>
                        <!-- Our Transformation Item End -->
                    </div>
                    <!-- Our Transformation Box End -->
                </div>

                <div class="col-lg-12">
                    <!-- Section Footer Text Start -->
                    <div class="section-footer-text wow fadeInUp" data-wow-delay="0.4s">
                        <p><span>Free</span>Crafted for Your Cravings: Today's Must- <a href="#">Try Selection</a></p>
                    </div>
                    <!-- Section Footer Text End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Transformation Section End -->

    <!-- Book Appointment Section Start -->
    <div class="book-appointment bg-section parallaxie">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Appointment Form Box Start -->
                    <div class="appointment-form-box">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Get your free treatment plan</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Request Your Personalized Plan</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Let&#39;s start your smile journey together. Tell us what you need, and we&#39;ll handle the rest.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Book Appointment Form Start -->
                        <div class="appointment-form wow fadeInUp" data-wow-delay="0.4s">
                            <form id="appointmentForm" action="#" method="POST" data-toggle="validator">
                                <input type="hidden" name="language" value="{{ app()->getLocale() }}">
                                <input type="hidden" name="status" value="pending">
                                <div class="row contact-form">                                
                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">Full Name*</label>
                                        <input type="text" name="name" class="form-control" id="fname" placeholder="Your full name" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">Email Address*</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-4">
                                        <label class="form-label">WhatsApp / Phone Number*</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Include country code, e.g., +1 234
567 890" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>            
                                    <div class="form-group col-md-12 mb-4">
                                        <label class="form-label">Interested Service*</label> <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" name="interest[]" type="checkbox" value="porcelain_veneers" id="flexCheckDefault" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Porcelain Veneers
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="interest[]" type="checkbox" value="dental_implants" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Dental Implants
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="interest[]" type="checkbox" value="general_dental_consultation" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                General Dental Consultation
                                            </label>
                                        </div>
                                    </div>                     
                                    <div class="form-group col-md-12 col-lg-12 mb-4">
                                        <label class="form-label">Briefly describe your dental needs</label>
                                        <textarea name="briefly" rows="5" cols="40" class="form-control" placeholder="Share your current concerns or goals (e.g., stained teeth,
missing tooth, etc.)"></textarea>
                                    </div>   
                
                                    <div class="col-md-12">
                                        <div class="appointment-form-btn">
                                            <button type="submit" id="submitBtn" class="btn-default"><span class="btn-text">Get My Free Plan</span></button>
                                            <div class="form-loading d-none" id="formLoading">
                                                <div class="spinner-border text-primary" role="status"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Book Appointment Form End -->
                    </div>
                    <!-- Appointment Form Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Book Appointment Section End -->

    <!-- Footer Start -->
    <footer class="main-footer bg-section dark-section">
		<div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Footer About Start -->
                    <div class="footer-about">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            <img src="./assets/images/footer_logo.png" alt="">
                        </div>
                        <!-- Footer Logo End -->

                        <!-- About Footer Content Start -->
                        <div class="about-footer-content">
                            <p>Comprehensive dental services, confident smiles through, personalized care.</p>
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
                            <h3>quick links</h3>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#about-us">About us</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->

                        <!-- Footer Links Start -->
                        <div class="footer-links">
                            <h3>Support</h3>
                            <ul>
                                <li><a href="#">Term's & Condition </a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- Footer Links End -->
    
                        <!-- Footer Links Start -->
                        <div class="footer-links footer-contact-links">
                            <h3>Contact Us</h3>
                            <!-- Footer Contact Box Start -->
                            <div class="footer-contact-box">
                                <div class="footer-contact-box-title">
                                    <h3><a class="fontsize13" href="mailto:support@vietnamdentalcare.vn">support@vietnamdentalcare.vn</a></h3>
                                    <h3><a class="fontsize14" href="tel:+84 0799 108 727">+84 0799 108 727</a></h3>
                                </div>
                                <div class="footer-contact-box-hour">
                                    <p>Mon to Sat: <span>9AM to 9PM </span></p>
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
                        <p>Copyright © <?= date('Y') ?> All Rights Reserved.</p>
                    </div>
                    <!-- Footer Copyright Text End -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Jquery Library File -->
    <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js file -->
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Validator js file -->
    <script src="./assets/js/validator.min.js"></script>
    <!-- SlickNav js file -->
    <script src="./assets/js/jquery.slicknav.js"></script>
    <!-- Swiper js file -->
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <!-- Counter js file -->
    <script src="./assets/js/jquery.waypoints.min.js"></script>
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <!-- Magnific js file -->
    <script src="./assets/js/jquery.magnific-popup.min.js"></script>
    <!-- SmoothScroll -->
    <script src="./assets/js/SmoothScroll.js"></script>
    <!-- Parallax js -->
    <script src="./assets/js/parallaxie.js"></script>
    <!-- Image Comparision js -->
    <script src="./assets/js/jquery.event.move.js"></script>
	<script src="./assets/js/jquery.twentytwenty.js"></script>
    <!-- MagicCursor js file -->
    <script src="./assets/js/gsap.min.js"></script>
    <script src="./assets/js/magiccursor.js"></script>
    <!-- Text Effect js file -->
    <script src="./assets/js/SplitText.min.js"></script>
    <script src="./assets/js/ScrollTrigger.min.js"></script>
    <!-- YTPlayer js File -->
    <script src="./assets/js/jquery.mb.YTPlayer.min.js"></script>
    <!-- Wow js file -->
    <script src="./assets/js/wow.min.js"></script>
    <!-- Main Custom js file -->
    <script src="./assets/js/function.js"></script>
    <script src="./assets/js/custom.js?v={{ filemtime(public_path('assets/js/custom.js')) }}"></script>
</body>
</html>