@extends('layouts.guest')
@section('title', 'Vietnam Dental Care | About us')
@section('description', 'Vietnam Dental Care specializes in dental implants, orthodontics, porcelain crowns, veneers, teeth whitening, and comprehensive dental care with advanced technology and personalized treatment.')

@section('schema')
    @verbatim
        <script type="application/ld+json">
            {
            "@context":"https://schema.org",
            "@type":"WebPage",
            "url":"https://vietnamdentalcare.vn/about-us",
            "name":"Vietnam Dental Care | About us",
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
    <!-- Page Header Start -->
    <div class="page-header bg-section dark-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">{{ __('about.title') }}</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('about.home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('about.title') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="our-approach bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">{{ __('about.foundation_subtitle') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('about.foundation_title') }}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <!-- Approach Item Start -->
                    <div class="approach-item box-bg-shape wow fadeInUp" data-wow-delay="0.2s">
                        <div class="approach-item-content">
                            <h3>{{ __('about.mission_title') }}</h3>
                            <p>{{ __('about.mission_desc') }}</p>
                        </div>
                        <div class="approach-item-list">
                            <ul>
                                <li>{{ __('about.mission_item_1') }}</li>
                                <li>{{ __('about.mission_item_2') }}</li>
                                <li>{{ __('about.mission_item_3') }}</li>
                            </ul>
                        </div>
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icon-approach-1.svg') }}" alt="">
                        </div>
                    </div>
                    <!-- Approach Item End -->
                </div>

                <div class="col-xl-4 col-md-6">
                    <!-- Approach Item Start -->
                    <div class="approach-item box-bg-shape wow fadeInUp" data-wow-delay="0.4s">
                        <div class="approach-item-content">
                            <h3>{{ __('about.vision_title') }}</h3>
                            <p>{{ __('about.vision_desc') }}</p>
                        </div>
                        <div class="approach-item-list">
                            <ul>
                                <li>{{ __('about.vision_item_1') }}</li>
                                <li>{{ __('about.vision_item_2') }}</li>
                                <li>{{ __('about.vision_item_3') }}</li>
                            </ul>
                        </div>
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icon-approach-2.svg') }}" alt="">
                        </div>
                    </div>
                    <!-- Approach Item End -->
                </div>

                <div class="col-xl-4 col-md-6">
                    <!-- Approach Item Start -->
                    <div class="approach-item box-bg-shape wow fadeInUp" data-wow-delay="0.6s">
                        <div class="approach-item-content">
                            <h3>{{ __('about.value_title') }}</h3>
                            <p>{{ __('about.value_desc') }}</p>
                        </div>
                        <div class="approach-item-list">
                            <ul>
                                <li>{{ __('about.value_item_1') }}</li>
                                <li>{{ __('about.value_item_2') }}</li>
                                <li>{{ __('about.value_item_3') }}</li>
                            </ul>
                        </div>
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icon-approach-3.svg') }}" alt="">
                        </div>
                    </div>
                    <!-- Approach Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Approach Section End -->

    <!-- How It Work Section Start -->
    <div class="how-it-work">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <!-- How It Work Image Box Start -->
                    <div class="how-it-work-image-box wow fadeInUp">
                        <!-- How It Work Image Start -->
                        <div class="how-it-work-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/images/how-it-work-image.jpg') }}" alt="">
                            </figure>
                        </div>
                        <!-- How It Work Image End -->

                        <!-- Work Client Box Start -->
                        <div class="work-client-box">
                            <!-- Satisfy Client Images Start -->
                            <div class="satisfy-client-images">
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="{{ asset('assets/images/author-1.jpg') }}" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="{{ asset('assets/images/author-2.jpg') }}" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="{{ asset('assets/images/author-3.jpg') }}" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image">
                                    <figure class="image-anime">
                                        <img src="{{ asset('assets/images/author-4.jpg') }}" alt="">
                                    </figure>
                                </div>
                                <div class="satisfy-client-image add-more">
                                    <h3><span class="counter">15</span>K+</h3>
                                </div>
                            </div>
                            <!-- Satisfy Client Images End -->

                            <!-- Satisfy Client Content Start -->
                            <div class="satisfy-client-content">
                                <p><span>98%</span> {{ __('about.satisfaction_rate') }}</p>
                            </div>
                            <!-- Satisfy Client Content End -->
                        </div>
                        <!-- Work Client Box End -->
                    </div>
                    <!-- How It Work Image Box End -->
                </div>

                <div class="col-xl-6">
                    <!-- How It Work Content Start -->
                    <div class="how-it-work-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ __('about.journey_subtitle') }}</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('about.journey_title') }}</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Work Step Item List Start -->
                        <div class="work-step-item-list wow fadeInUp" data-wow-delay="0.2s">
                            <!-- Work Step Item Start -->
                            <div class="work-step-item">
                                <div class="work-step-no">
                                    <h3>01</h3>
                                </div>
                                <div class="work-step-item-content">
                                    <h3>{{ __('about.step_1_title') }}</h3>
                                    <p>{{ __('about.step_1_desc') }}</p>
                                    <p>{{ __('about.step_1_note') }}</p>
                                </div>
                            </div>
                            <!-- Work Step Item End -->

                            <!-- Work Step Item Start -->
                            <div class="work-step-item">
                                <div class="work-step-no">
                                    <h3>02</h3>
                                </div>
                                <div class="work-step-item-content">
                                    <h3>{{ __('about.step_2_title') }}</h3>
                                    <p>{{ __('about.step_2_desc') }}</p>
                                </div>
                            </div>
                            <!-- Work Step Item End -->
                            
                            <!-- Work Step Item Start -->
                            <div class="work-step-item">
                                <div class="work-step-no">
                                    <h3>03</h3>
                                </div>
                                <div class="work-step-item-content">
                                    <h3>{{ __('about.step_3_title') }}</h3>
                                    <p>{{ __('about.step_3_desc') }}</p>
                                </div>
                            </div>
                            <!-- Work Step Item End -->

                            <!-- Work Step Item Start -->
                            <div class="work-step-item">
                                <div class="work-step-no">
                                    <h3>04</h3>
                                </div>
                                <div class="work-step-item-content">
                                    <h3>{{ __('about.step_4_title') }}</h3>
                                    <p>{{ __('about.step_4_desc') }}</p>
                                </div>
                            </div>
                            <!-- Work Step Item End -->
                        </div>
                        <!-- Work Step Item List End -->
                    </div>
                    <!-- How It Work Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- How It Work Section End -->
@endsection