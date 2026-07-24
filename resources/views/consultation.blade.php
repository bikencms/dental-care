@extends('layouts.mail')
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
                "@id":"https://vietnamdentalcare.vn/#consultation",
                "url":"https://vietnamdentalcare.vn",
                "name":"Vietnam Dental Care | Dental Implants, Braces & Cosmetic Dentistry",
                "description":"Vietnam Dental Care provides dental implants, orthodontics, cosmetic dentistry, veneers, crowns and comprehensive oral healthcare.",
                "isPartOf":{
                    "@id":"https://vietnamdentalcare.vn/#website"
                },
                "about":{
                    "@id":"https://vietnamdentalcare.vn/#consultation"
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
   
<!-- Header Start -->
	<header class="main-header">
		<div class="header-sticky bg-section">
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid">
					<!-- Logo Start -->
					<a class="navbar-brand" href="./">
						<img src="../assets/images/logo.png?Aaa" alt="Logo" width="185">
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
                                        <img src="../assets/images/svg/vn.svg" alt="Language VI" width="18">
                                    @else
                                        <img src="../assets/images/svg/us.svg" alt="Language EN" width="18">
                                    @endif
                                    </a>
                                    <ul class="language">                                        
                                        <li class="nav-item"><a class="nav-link" href="/"><img src="../assets/images/svg/us.svg" alt="Language EN" width="18"></a></li>
                                        <li class="nav-item"><a class="nav-link" href="/vi"><img src="../assets/images/svg/vn.svg" alt="Language VN" width="18"></a></li>
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
                                            <input class="form-check-input" name="interest[]" type="checkbox" value="pediatric_dentistry" id="flexCheckDefault" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Porcelain Veneers
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="interest[]" type="checkbox" value="orthodontics" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Dental Implants
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="interest[]" type="checkbox" value="pediatric_dentistry" id="flexCheckDefault">
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
@endsection