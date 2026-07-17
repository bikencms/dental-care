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
                                    <p>Transparent Pricing - No Hidden Costs</p>
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
                            <h3 class="wow fadeInUp">About Us</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">You are never alone on this journey</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">At VDC, you are not just a patient. You have a dedicated Case Manager supporting you
24/7 to ensure a seamless experience</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Us List Start -->
                        <div class="about-us-list wow fadeInUp" data-wow-delay="0.4s">
                            <ul class="custom">
                                <li>Personalized Consultation: Customized treatment plans tailored to your
specific goals and budget</li>
                                <li>Worry-Free Experience: We manage everything—from scheduling and logistics
to language support—so you can focus on your smile</li>
                                <li>Uncompromising Quality: We use only certified, premium materials that meet
international standards.</li>
                            </ul>
                        </div>
                        <!-- About Us list End -->

                        <!-- About Author Body Start -->
                        <div class="about-author-body wow fadeInUp" data-wow-delay="0.6s">
                            <div class="about-author-content custom">
                                <h3>Save up to 70% compared to treatment costs in
your home country</h3>
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
@endsection