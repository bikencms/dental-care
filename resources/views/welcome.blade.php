@extends('layouts.guest')
@section('title', __('home.title'))
@section('description', __('home.description'))

@section('schema')
    @verbatim
        <script type="application/ld+json">
            {
                "@context":"https://schema.org",
                "@type":"WebSite",
                "@id":"https://vietnamdentalcare.vn/#website",
                "url":"https://vietnamdentalcare.vn",
                "name":"Vietnam Dental Care",
                "alternateName":"Vietnam Dental Care Clinic",
                "description":"Vietnam Dental Care provides high-quality dental treatments for local and international patients.",
                "publisher":{
                    "@id":"https://vietnamdentalcare.vn/#organization"
                },
                "inLanguage":"en",
                "potentialAction":{
                    "@type":"SearchAction",
                    "target":{
                    "@type":"EntryPoint",
                    "urlTemplate":"https://vietnamdentalcare.vn/search?q={search_term_string}"
                    },
                    "query-input":"required name=search_term_string"
                }
            }
        </script>

        <script type="application/ld+json">
            {
                "@context":"https://schema.org",
                "@type":"WebPage",
                "@id":"https://vietnamdentalcare.vn/#homepage",
                "url":"https://vietnamdentalcare.vn",
                "name":"Vietnam Dental Care | Dental Implants, Braces & Cosmetic Dentistry",
                "description":"Vietnam Dental Care provides dental implants, orthodontics, cosmetic dentistry, veneers, crowns and comprehensive oral healthcare.",
                "isPartOf":{
                    "@id":"https://vietnamdentalcare.vn/#website"
                },
                "about":{
                    "@id":"https://vietnamdentalcare.vn/#clinic"
                },
                "primaryImageOfPage":{
                    "@type":"ImageObject",
                    "url":"https://vietnamdentalcare.vn/images/home-banner.jpg"
                },
                "inLanguage":"en"
            }
        </script>
    @endverbatim
@endsection

@section('content')
    <!-- Hero Section Start -->
    <div class="hero bg-section dark-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Hero Box Start -->
                    <div class="hero-box">
                        <!-- Hero Content Start -->
                        <div class="hero-content">
                            <!-- Hero Sub Heading Start -->
                            <div class="hero-sub-heading wow fadeInUp">
                                <!-- Satisfy Client Images Start -->
                                <div class="satisfy-client-images">
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="./assets/images/author-1.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="./assets/images/author-2.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="./assets/images/author-3.jpg" alt="">
                                        </figure>
                                    </div>
                                    <div class="satisfy-client-image">
                                        <figure class="image-anime">
                                            <img src="./assets/images/author-4.jpg" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <!-- Satisfy Client Images End -->

                                <!-- Satisfy Client Content Start -->
                                <div class="satisfy-client-content">
                                    <p>15k {{ __('home.satisfied_patients') }}</p>
                                </div>
                                <!-- Satisfy Client Content End -->
                            </div>
                            <!-- Hero Sub Heading Start -->
                            
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h1 class="wow fadeInUp" data-wow-delay="0.2s" data-cursor="-opaque">
                                {{ __('home.hero_title1') }} 
                                <img src="./assets/images/hero-title-image.jpg" alt="">
                                {{ __('home.hero_title2') }} 
                            </h1>
                                <p class="wow fadeInUp" data-wow-delay="0.4s">{{ __('home.hero_description1') }}</p>
                                <p class="wow fadeInUp" data-wow-delay="0.4s">{{ __('home.hero_description2') }}</p>
                            </div>
                            <!-- Section Title End -->
    
                            <!-- Hero Button Start -->
                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.6s">
                                <a href="#appointmentForm" class="btn-default btn-highlighted">{{ __('home.button') }}</a>
                            </div>
                            <!-- Hero Button End -->
                        </div>
                        <!-- Hero Content End -->       
                         
                        <!-- Hero Info List Start -->
                        <div class="hero-info-item-list">
                            <!-- Hero Info Item Start -->
                            <div class="hero-info-item box-1 wow fadeInUp">
                                <!-- Hero Info Header Start -->
                                <div class="hero-info-header">
                                    <div class="hero-info-title">
                                        <h3>{{ __('home.hero_info1') }}</h3>
                                    </div>
                                    <div class="hero-info-btn">
                                        <a href="#">
                                            <img src="./assets/images/arrow-white.svg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <!-- Hero Info Header End -->
                                
                                <!-- Hero Info Body Start -->
                                <div class="hero-info-body">
                                    <div class="satisfy-client-images">
                                        <div class="satisfy-client-image">
                                            <figure class="image-anime">
                                                <img src="./assets/images/author-1.jpg" alt="">
                                            </figure>
                                        </div>
                                        <div class="satisfy-client-image">
                                            <figure class="image-anime">
                                                <img src="./assets/images/author-2.jpg" alt="">
                                            </figure>
                                        </div>
                                        <div class="satisfy-client-image">
                                            <figure class="image-anime">
                                                <img src="./assets/images/author-3.jpg" alt="">
                                            </figure>
                                        </div>
                                        <div class="satisfy-client-image">
                                            <figure class="image-anime">
                                                <img src="./assets/images/author-4.jpg" alt="">
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="satisfy-client-content">
                                        <p>{{ __('home.hero_info_description1') }}</p>
                                    </div>
                                </div>
                                <!-- Hero Info Body End -->
                            </div>
                            <!-- Hero Info Item End -->
    
                            <!-- Hero Info Image Item Start -->
                            <div class="hero-info-image-item box-2 wow fadeInUp" data-wow-delay="0.2s">
                                <!-- Hero Info Image Start -->
                                <div class="hero-info-image">
                                    <figure class="image-anime">
                                        <img src="./assets/images/hero-info-item-image-1.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- Hero Info Image End -->

                                <!-- Hero Info Content Start -->
                                <div class="hero-info-content">
                                    <div class="hero-info-title">
                                        <h3>{{ __('home.hero_info2') }}</h3>
                                    </div>
                                    <div class="hero-info-list">
                                        <ul class="custom">
                                            <li>{{ __('home.hero_info2_1') }}</li>
                                            <li>{{ __('home.hero_info2_2') }}</li>
                                            <li>{{ __('home.hero_info2_3') }}</li>
                                            <li>{{ __('home.hero_info2_4') }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Hero Info Content End -->
                            </div>
                            <!-- Hero Info Image Item End -->
    
                            <!-- Working Hours Item Start -->
                            <div class="hero-info-item box-3 wow fadeInUp" data-wow-delay="0.4s">
                                <!-- Working Hours Header Start -->
                                <div class="working-hours-header hero-info-title">
                                    <img src="./assets/images/icon-clock-white.svg" alt="">
                                    <h3 class="custom">{{ __('home.hero_info3') }}</h3>
                                </div>
                                <!-- Working Hours Header End -->
                                
                                <!-- Working Hours Body Start -->
                                <div class="working-hours-body">
                                    <div class="working-hours-list">
                                        <ul>
                                            <li><span>{{ __('home.hero_info3_1') }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="working-hours-btn">
                                        <a href="#appointmentForm" class="btn-default btn-highlighted custom">{{ __('home.button1') }}</a>
                                    </div>
                                </div>
                                <!-- Working Hours Body End -->
                            </div>
                            <!-- Working Hours Item End -->
    
                            <!-- Hero Info Video Image Start -->
                            <div class="hero-info-image-item box-4 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="hero-info-image">
                                    <figure class="image-anime">
                                        <img src="./assets/images/hero-info-item-image-2.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="hero-info-btn">
                                    <a href="#">
                                        <img src="./assets/images/arrow-white.svg" alt="">
                                    </a>
                                </div>
                                <div class="hero-info-contact-list">
                                    <ul>
                                        <li><img src="./assets/images/icon-phone-white.svg" alt=""><a href="tel:+84 799 108 727">+84 799 108 727</a></li>
                                        <li><img src="./assets/images/icon-mail-white.svg" alt=""><a class="fontsize14" href="mailto:support@vietnamdentalcare.vn">support@vietnamdentalcare.vn</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Hero Info Video Image End -->
                        </div>
                        <!-- Hero Info List End -->
                    </div>
                    <!-- Hero Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->
    
    <!-- About Us Section Start -->
    <div class="about-us" id="about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <!-- About Us Images Start -->
                    <div class="about-us-images wow fadeInUp">
                        <!-- About Image Box 1 Start -->
                        <div class="about-image-box-1">
                            <!-- About Image Start -->
                            <div class="about-image">
                                <figure>
                                    <img src="./assets/images/about-us-image-1.png" alt="">
                                </figure>
                            </div>
                            <!-- About Image End -->
                        </div>
                        <!-- About Image Box 1 End -->

                        <!-- About Image Box 2 Start -->
                        <div class="about-image-box-2">
                            <!-- About Image Start -->
                            <div class="about-image">
                                <figure class="image-anime reveal">
                                    <img src="./assets/images/about-us-image-2.jpg" alt="">
                                </figure>
                                
                                <!-- Year Experience Box Start -->
                                <div class="year-experience-circle">
                                    <img src="./assets/images/circle.png" alt="">
                                </div>
                                <!-- Year Experience Box End -->
                            </div>
                            <!-- About Image End -->
                            
                            <!-- About Counter Box Start -->
                            <div class="about-counter-box">
                                <div class="about-counter-info">
                                    <h2><span class="counter">4.9</span>/5</h2>
                                    <ul>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="about-counter-content">
                                    <p>{{ __('home.transparent_pricing') }}</p>
                                </div>
                            </div>
                            <!-- About Counter Box End -->
                        </div>
                        <!-- About Image Box 2 End -->
                    </div>
                    <!-- About Us Images End -->
                </div>

                <div class="col-xl-6">
                    <!-- About Us Content Start -->
                    <div class="about-us-content">
                        <!-- Section Title Start -->
                        <div class="section-title custom">
                            <h3 class="wow fadeInUp">{{ __('home.hero_info4') }}</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('home.home_about') }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">{{ __('home.home_about_description') }}</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Us List Start -->
                        <div class="about-us-list wow fadeInUp" data-wow-delay="0.4s">
                            <ul class="custom">
                                <li>{{ __('home.home_about_description1') }}</li>
                                <li>{{ __('home.home_about_description2') }}</li>
                                <li>{{ __('home.home_about_description3') }}</li>
                            </ul>
                        </div>
                        <!-- About Us list End -->

                        <!-- About Author Body Start -->
                        <div class="about-author-body wow fadeInUp" data-wow-delay="0.6s">
                            <div class="about-author-content custom">
                                <h3>{{ __('home.author') }}</h3>
                            </div>
                            <div class="satisfy-client-images">
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="./assets/images/author-1.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="./assets/images/author-2.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="./assets/images/author-3.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="./assets/images/author-4.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image add-more">
                                    <i class="fa fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <!-- About Author Body End -->
                    </div>
                    <!-- About Us Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->
    <!-- Our Services Section Start -->
    <div class="our-services bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">{{ __('home.our_service') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('home.our_service2') }}</h2>
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
                            <h3><a href="#">{{ __('home.our_service_title1') }}</a></h3>
                            <p>{{ __('home.our_service_description1') }}</p>
                        </div>
                        <!-- Hero Button Start -->
                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.6s">
                                <a href="#appointmentForm" class="btn-default btn-highlighted">{{ __('home.service_button1') }}</a>
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
                            <h3><a href="#">{{ __('home.our_service_title2') }}</a></h3>
                            <p>{{ __('home.our_service_description2') }}</p>
                        </div>
                        <!-- Hero Button Start -->
                            <div class="hero-btn wow fadeInUp" data-wow-delay="0.6s">
                                <a href="#appointmentForm" class="btn-default btn-highlighted">{{ __('home.service_button2') }}</a>
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
                        <h3 class="wow fadeInUp">{{ __('home.choice') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('home.choice_title') }}</h2>
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
                                <h3>{{ __('home.icon_1_title') }}</h3>
                                <p>{{ __('home.icon_1_text') }}</p>
                            </div>
                        </div>
                        <!-- Why Choose Item End -->

                        <!-- Why Choose Item Start -->
                        <div class="why-choose-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="./assets/images/icon-why-choose-2.svg" alt="">
                            </div>
                            <div class="why-choose-item-content">
                                <h3>{{ __('home.icon_2_title') }}</h3>
                                <p>{{ __('home.icon_2_text') }}</p>
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
                                <h3>{{ __('home.icon_3_title') }}</h3>
                                <p>{{ __('home.icon_3_text') }}</p>
                            </div>
                        </div>
                        <!-- Why Choose Item End -->

                        <!-- Why Choose Item Start -->
                        <div class="why-choose-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="./assets/images/icon-why-choose-4.svg" alt="">
                            </div>
                            <div class="why-choose-item-content">
                                <h3>{{ __('home.icon_4_title') }}</h3>
                                <p>{{ __('home.icon_4_text') }}</p>
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
                        <h3 class="wow fadeInUp">{{ __('home.before_after') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('home.see_transformation_title') }}</h2>
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
                                    <button class="nav-link active" id="one-tab" data-bs-toggle="tab" data-bs-target="#one" type="button" role="tab" aria-selected="true">
                                        <img src="./assets/images/icon-transformation-nav-1.svg" alt="">{{ __('home.tab_invisalign') }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="two-tab" data-bs-toggle="tab" data-bs-target="#two" type="button" role="tab" aria-selected="false">
                                        <img src="./assets/images/icon-transformation-nav-2.svg" alt="">{{ __('home.tab_veneers_bonding') }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="three-tab" data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab" aria-selected="false">
                                        <img src="./assets/images/icon-transformation-nav-3.svg" alt="">{{ __('home.tab_pediatric') }}
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="four-tab" data-bs-toggle="tab" data-bs-target="#four" type="button" role="tab" aria-selected="false">
                                        <img src="./assets/images/icon-transformation-nav-4.svg" alt="">{{ __('home.tab_teeth_whitening') }}
                                    </button>
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
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-1.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-1.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-2.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-2.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-3.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-3.jpg" alt="">
                                        </div>
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
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-4.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-4.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-5.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-5.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-6.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-6.jpg" alt="">
                                        </div>
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
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-7.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-7.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-8.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-8.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-9.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-9.jpg" alt="">
                                        </div>
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
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-2.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-2.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-6.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-6.jpg" alt="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="transformation_image">                  
                                            <img src="./assets/images/transformation-img-before-1.jpg" alt="">
                                            <img src="./assets/images/transformation-img-after-1.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Transformation Image Box End -->
                        </div>
                        <!-- Our Transformation Item End -->
                    </div>
                    <!-- Our Transformation Box End -->
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
                            <h3 class="wow fadeInUp">{{ __('home.plan_title') }}</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('home.plan_title') }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">{{ __('home.plan_sub_headline') }}</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Book Appointment Form Start -->
                        <div class="appointment-form wow fadeInUp" data-wow-delay="0.4s">
                            <form id="appointmentForm" action="#" method="POST" data-toggle="validator">
                                <input type="hidden" name="language" value="{{ app()->getLocale() }}">
                                <input type="hidden" name="status" value="pending">
                                
                                <div class="row contact-form">                                
                                    {{-- Full Name --}}
                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">{{ __('home.form.full_name') }}*</label>
                                        <input type="text" name="name" class="form-control" id="fname" placeholder="{{ __('home.form.full_name_placeholder') }}" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    {{-- Email Address --}}
                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">{{ __('home.form.email') }}*</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="{{ __('home.form.email_placeholder') }}" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    {{-- Interested Service --}}
                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">{{ __('home.form.service') }}*</label> <br/>
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" name="interest[]" type="checkbox" value="porcelain_veneers" id="checkVeneers" checked>
                                            <label class="form-check-label" for="checkVeneers">
                                                {{ __('home.form.services.veneers') }}
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" name="interest[]" type="checkbox" value="dental_implants" id="checkImplants">
                                            <label class="form-check-label" for="checkImplants">
                                                {{ __('home.form.services.implants') }}
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" name="interest[]" type="checkbox" value="general_dental_consultation" id="checkConsultation">
                                            <label class="form-check-label" for="checkConsultation">
                                                {{ __('home.form.services.consultation') }}
                                            </label>
                                        </div>
                                    </div>

                                    {{-- Phone / WhatsApp Number --}}
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label block mb-4">{{ __('home.form.phone') }}*</label>
                                        <!-- Input hiển thị cho người dùng nhập -->
                                        <input type="tel" id="phone_input" class="form-control w-full" placeholder="{{ __('home.form.phone_placeholder') }}" required>
                                        <!-- Input ẩn chứa dữ liệu số hoàn chỉnh (Mã quốc gia + Số ĐT) gửi lên Server -->
                                        <input type="hidden" name="phone" id="phone_full">
                                        <div class="help-block with-errors"></div>
                                    </div>    
                                                            
                                    {{-- Briefly Describe --}}
                                    <div class="form-group col-md-12 col-lg-12 mb-4">
                                        <label class="form-label">{{ __('home.form.briefly') }}</label>
                                        <textarea name="briefly" rows="5" cols="40" class="form-control" placeholder="{{ __('home.form.briefly_placeholder') }}"></textarea>
                                    </div>   
                                
                                    {{-- Submit Button --}}
                                    <div class="col-md-12">
                                        <div class="appointment-form-btn">
                                            <button type="submit" id="submitBtn" class="btn-default">
                                                <span class="btn-text">{{ __('home.form.submit_btn') }}</span>
                                            </button>
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

    @push('scripts')
        <script src="./assets/js/custom.js?v={{ filemtime(public_path('assets/js/custom.js')) }}"></script>
        <!-- CSS Intl-Tel-Input -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

        <!-- JS Intl-Tel-Input -->
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const phoneInput = document.querySelector("#phone_input");
                const phoneFullHidden = document.querySelector("#phone_full");

                // Khởi tạo thư viện Intl-Tel-Input
                const iti = window.intlTelInput(phoneInput, {
                    initialCountry: "auto", // Tự động chọn quốc gia theo IP người dùng (hoặc đặt "vn", "us"...)
                    geoIpLookup: function(success, failure) {
                        fetch("https://1.1.1.1/cdn-cgi/trace")
                        .then(res => res.text())
                        .then(text => {
                            // Chuỗi trả về dạng text, ta split để lấy loc (Mã quốc gia)
                            const data = Object.fromEntries(text.trim().split('\n').map(line => line.split('=')));
                        })
                        .then(data => success(data.loc))
                            .catch(() => success("vn")); // Mặc định Việt Nam nếu lỗi;
                    },
                    separateDialCode: true, // Tách mã vùng hiển thị bên cạnh cờ
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
                });

                // Cập nhật giá trị vào input hidden [name="phone"]
                function updatePhoneNumber() {
                    // iti.getNumber() sẽ trả về định dạng chuẩn quốc tế, VD: +84901234567
                    phoneFullHidden.value = iti.getNumber();
                }

                phoneInput.addEventListener('change', updatePhoneNumber);
                phoneInput.addEventListener('keyup', updatePhoneNumber);

                // Cập nhật lần cuối trước khi submit form
                const form = phoneInput.closest('form');
                if (form) {
                    form.addEventListener('submit', function () {
                        updatePhoneNumber();
                    });
                }
            });
        </script>
    @endpush
@endsection