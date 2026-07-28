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
            <div class="row">
                <div class="col-xl-6">
                    <!-- Contact Us Form Start -->
                    <div class="contact-us-form">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">get in touch</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Reach out to schedule your next dental visit</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Whether you have a question, need expert advice, or are ready to book your next appointment, our team is here to help. by phone, email,</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">First Name*</label>
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter First Name *" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">Last Name*</label>
                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Last Name *" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">Email Address*</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address *" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <label class="form-label">Phone Number*</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number *" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-5">
                                        <label class="form-label">Message</label>
                                        <textarea name="message" class="form-control" id="message" rows="4" placeholder="Write message..."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn-default"><span>send message</span></button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                    <!-- Contact Us Form End -->
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
                            <!-- Conatct Info Item Start -->
                            <div class="contact-info-item wow fadeInUp">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icon-phone-white.svg') }}" alt="">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Contact Info Content Start -->
                                <div class="contact-info-content">
                                    <h3>Phone Number</h3>
                                    <p><a href="tel:+789345601">+(84) 799 108 727</a></p>
                                </div>
                                <!-- Contact Info Content End -->
                            </div>
                            <!-- Conatct Info Item End -->

                            <!-- Conatct Info Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icon-mail-white.svg') }}" alt="">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Contact Info Content Start -->
                                <div class="contact-info-content">
                                    <h3>Email Address</h3>
                                    <p><a href="mailto:support@vietnamdentalcare.vn">support@vietnamdentalcare.vn</a></p>
                                </div>
                                <!-- Contact Info Content End -->
                            </div>
                            <!-- Conatct Info Item End -->

                            <!-- Conatct Info Item Start -->
                            <div class="contact-info-item location-info-item wow fadeInUp" data-wow-delay="0.4s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="{{ asset('assets/images/icon-location-white.svg') }}" alt="">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Contact Info Content Start -->
                                <div class="contact-info-content">
                                    <h3>Our Location</h3>
                                    <p>An Khanh ward, Thủ Đức City,
Ho Chí Minh city</p>
                                </div>
                                <!-- Contact Info Content End -->
                            </div>
                            <!-- Conatct Info Item End -->
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