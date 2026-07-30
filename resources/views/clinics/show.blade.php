<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $clinic->name }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="{{ $clinic->description }}">
    <meta name="keywords" content="Vietnam Dental Care, dental clinic Vietnam, dental implants Vietnam, cosmetic dentistry, orthodontics, braces, porcelain veneers, dental crowns, teeth whitening, smile makeover, oral surgery, affordable dental care, international dental clinic, Ho Chi Minh dental clinic">
    <meta name="author" content="Minh Biken">
    
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://vietnamdentalcare.vn/assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="https://vietnamdentalcare.vn/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://vietnamdentalcare.vn/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://vietnamdentalcare.vn/assets/images/favicon-16x16.png">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vietnam Dental Care | {{ __('clinics.page_title') }}">
    <meta property="og:title" content="Vietnam Dental Care | {{ __('clinics.page_title') }}">
    <meta property="og:description" content="{{ __('clinics.subheading') }}">
    <meta property="og:url" content="https://vietnamdentalcare.vn/clinics">
    <meta property="og:image" content="https://vietnamdentalcare.vn/assets/images/og-image.png">
    <meta property="og:locale" content="en_US">

    @if(app()->getLocale() == 'vi')
        <link rel="canonical" href="https://vietnamdentalcare.vn/vi/clinics">
    @else
        <link rel="canonical" href="https://vietnamdentalcare.vn/clinics">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    
    <!-- Google Fonts Css-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
        <!-- Font Awesome Icon Css-->
        <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" media="screen">
        <!-- Animated Css -->
        <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
        <!-- Mouse Cursor Css File -->
        <link rel="stylesheet" href="{{ asset('assets/css/mousecursor.css') }}">
        <!-- Main Custom Css -->
        <link href="{{ asset('assets/css/custom.css') }}?v={{ filemtime(public_path('assets/css/custom.css')) }}" rel="stylesheet" media="screen">
</head>
<body class="bg-slate-50 font-sans text-slate-700 antialiased">
    <!-- Preloader Start -->
        <div class="preloader">
            <div class="loading-container">
                <div class="loading"></div>
                <div id="loading-icon"><img src="{{ asset('assets/images/icon.png') }}" alt=""></div>
            </div>
        </div>
    <!-- Preloader End -->

    <!-- Our Expert Section Start -->
    <div class="our-expert bg-section dark-section parallaxie" style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Our Expert Section Start -->
                    <div class="our-expert-section">
                        <!-- Our Expert Content Start -->
                        <div class="our-expert-content section-title">
                            <!-- Dòng title lớn ghi thông tin tên phòng khám -->
                            <h1 class="display-1 fw-bold text-white mb-3 tracking-tight" data-cursor="-opaque" style="font-family: 'Sora', sans-serif;">
                                {{ $clinic->name }}
                            </h1>

                            <!-- Thông tin địa lý & đánh giá ngay dưới tên -->
                            <div class="d-flex flex-wrap align-items-center gap-3 fs-5 mb-4 text-light">
                                <span class="d-flex align-items-center gap-1">
                                    <i class="fa-solid fa-location-dot text-danger"></i> {{ $clinic->district }}, Ho Chi Minh City, Vietnam
                                </span>
                                <span class="opacity-50">|</span>
                                <span class="text-warning fw-semibold d-flex align-items-center gap-1">
                                    <i class="fa-solid fa-star"></i> {{ $clinic->rating ?? '4.9' }}/5 <span class="text-light fw-normal font-size-sm">({{ $clinic->reviews_count ?? '200+' }} International Reviews)</span>
                                </span>
                            </div>

                            <!-- Đoạn văn ngắn khoảng 3 câu miêu tả phòng khám lấy từ DB -->
                            <p class="lead text-light opacity-90 mb-4 lh-lg" style="font-size: 1.15rem;">
                                {{ $clinic->description ?? 'Welcome to our international standard dental clinic equipped with advanced modern technology. Our team of highly experienced specialists provides pain-free, world-class treatments tailored for overseas patients. Enjoy full English support and transparent pricing for your entire dental care journey.' }}
                            </p>

                            <!-- Load các tag đã viết sẵn cho phòng khám để hiển thị trong các block nhỏ dạng pill -->
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                @forelse($clinic->tags as $tag)
                                    <div class="tag-badge bg-white bg-opacity-10 text-white px-4 py-2 rounded-pill fs-6 border border-white border-opacity-10 backdrop-blur">
                                        {{ $tag->tag_name }}
                                    </div>
                                @empty
                                    <div class="tag-badge bg-white bg-opacity-10 text-white px-4 py-2 rounded-pill fs-6 border border-white border-opacity-10 backdrop-blur">General Dentistry</div>
                                    <div class="tag-badge bg-white bg-opacity-10 text-white px-4 py-2 rounded-pill fs-6 border border-white border-opacity-10 backdrop-blur">Emergency Dentistry</div>
                                    <div class="tag-badge bg-white bg-opacity-10 text-white px-4 py-2 rounded-pill fs-6 border border-white border-opacity-10 backdrop-blur">Advanced Technology</div>
                                @endforelse
                            </div>

                            <!-- Nút BOOK VIDEO CONSULTATION (Click scroll thẳng xuống khúc cuối book lịch) -->
                            <div class="pt-2">
                                <a href="#booking-section" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold text-uppercase shadow-lg transition-transform hover-scale">
                                    Book Video Consultation
                                </a>
                            </div>
                        </div>
                        <!-- Our Expert Content End -->
                    </div>
                    <!-- Our Expert Section End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Expert Section End -->

<!-- ==================== STICKY & HORIZONTAL SCROLLABLE TAB BAR ==================== -->
<nav class="clinic-sticky-bar bg-white border-bottom shadow-sm">
    <div class="container">
        <div class="tab-scroll-wrapper">
            <ul class="nav nav-pills flex-nowrap w-100 justify-content-between py-2 mb-0" id="clinicTabNav">
                <li class="nav-item flex-fill mx-1">
                    <a class="btn btn-primary btn-lg w-100 rounded-pill fw-bold active text-nowrap" href="#section-doctors" data-tab="section-doctors">Doctors</a>
                </li>
                <li class="nav-item flex-fill mx-1">
                    <a class="btn btn-outline-primary btn-lg w-100 rounded-pill fw-bold text-nowrap transition-transform hover-scale" href="#section-clinic" data-tab="section-clinic">Clinic</a>
                </li>
                <li class="nav-item flex-fill mx-1">
                    <a class="btn btn-outline-primary btn-lg w-100 rounded-pill fw-bold text-nowrap transition-transform hover-scale" href="#section-before-after" data-tab="section-before-after">Before & After</a>
                </li>
                <li class="nav-item flex-fill mx-1">
                    <a class="btn btn-outline-primary btn-lg w-100 rounded-pill fw-bold text-nowrap transition-transform hover-scale" href="#section-price-list" data-tab="section-price-list">Price List</a>
                </li>
                <li class="nav-item flex-fill mx-1">
                    <a class="btn btn-outline-primary btn-lg w-100 rounded-pill fw-bold text-nowrap transition-transform hover-scale" href="#section-testimonial" data-tab="section-testimonial">Testimonial</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ==================== MAIN CONTENT SECTIONS ==================== -->
<div class="container py-5">

    <!-- 1. DOCTORS -->
    <section id="section-doctors" class="clinic-section py-5 border-bottom">
        <!-- Our Team Start -->
        <div class="our-team">
            <div class="container">
                <div class="row section-row">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title section-title-center">
                            <h3 class="wow fadeInUp">Meet the Experts</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Trusted professionals creating smiles with expert care</h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>
                <div class="row">
                    @forelse($clinic->doctors as $doctor)
                    <div class="col-xl-3 col-md-6 mb-3">
                        <!-- Team Item Start -->
                        <div class="team-item card border-0 shadow-sm rounded-4 overflow-hidden h-100 bg-white">
                            
                            <!-- Doctor Image & Socials -->
                            <div class="team-image box-bg-shape position-relative overflow-hidden">
                                <figure class="m-0">
                                    <img src="{{ asset('assets/' . $doctor->avatar) }}" alt="{{ $doctor->name }}" class="w-100 object-fit-cover" style="height: 320px;">
                                </figure>
                                <div class="team-social-list">
                                    <div class="team-social-icon">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="team-readmore-btn">
                                        <a href="#"><img src="{{ asset('assets/images/icon-share.svg') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Team Content -->
                            <div class="team-content">
                                
                                <!-- Doctor Name & Title -->
                                <h3 class="fw-bold mb-1 fs-5">
                                    <a href="#" class="text-dark text-decoration-none hover-primary">{{ $doctor->name }}</a>
                                </h3>
                                <p class="text-primary fw-semibold small mb-3">{{ $doctor->title }}</p>

                                <!-- Specialty & Languages -->
                                <div class="doctor-meta border-top border-bottom py-2 my-3">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span class="badge bg-primary-subtle text-primary fw-medium px-2 py-1 rounded-2">Specialty</span>
                                        <span class="small fw-semibold text-secondary">Prosthodontics & Oral Implantology</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-light text-dark fw-medium px-2 py-1 rounded-2">Languages</span>
                                        <span class="small text-muted">🇺🇸 | 🇻🇳 </span>
                                    </div>
                                </div>

                                <!-- Top Credentials (Highlights) -->
                                <div class="mb-3">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 small fw-semibold" style="font-size: 10px;">
                                        🏆 USC Trained | MALO CLINIC ALL-ON-4™
                                    </span>
                                </div>

                                <!-- Accordion / Collapsible Details (Gọn gàng & chuyên nghiệp) -->
                                <div class="accordion accordion-flush" id="docAccordion{{ $loop->index ?? '1' }}">
                                    <div class="accordion-item bg-transparent border-0">
                                        <button  style="font-size: 18px; line-height: 22px" class="accordion-button collapsed p-0 bg-transparent shadow-none text-primary fw-bold small" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDoc{{ $loop->index ?? '1' }}">
                                            🎓 View Qualifications & Memberships
                                        </button>
                                        <div id="collapseDoc{{ $loop->index ?? '1' }}" class="accordion-collapse collapse" data-bs-parent="#docAccordion{{ $loop->index ?? '1' }}">
                                            <div class="accordion-body px-0 pt-3 pb-0">
                                                
                                                <!-- Education -->
                                                <h6 class="fw-bold small text-uppercase text-secondary mb-2">Education & Training</h6>
                                                <ul class="list-unstyled small text-muted mb-3 lh-sm">
                                                    <li class="mb-1">✓ Doctor of Dental Surgery (DDS)</li>
                                                    <li class="mb-1">✓ Grad. Dip. in Clinical Science (Prosthodontics)</li>
                                                    <li class="mb-1">✓ Diplomate in Oral Implantology</li>
                                                    <li class="mb-1">✓ ALL-ON-4™ MALO CLINIC Residency</li>
                                                    <li class="mb-1">✓ USC Comprehensive Implant Training</li>
                                                </ul>

                                                <!-- Associations -->
                                                <h6 class="fw-bold small text-uppercase text-secondary mb-2">Associations</h6>
                                                <ul class="list-unstyled small text-muted mb-0 lh-sm">
                                                    <li class="mb-1"><i class="fas fa-check-circle text-primary me-1"></i> Member, Vietnamese Dental Council</li>
                                                    <li class="mb-1"><i class="fas fa-check-circle text-primary me-1"></i> Member, International Team for Implantology (ITI)</li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Team Item End -->
                    </div>
                    @empty
                        <p class="text-muted">No doctor information available.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Our Team End -->

    </section>

    <!-- 2. CLINIC -->
    <section id="section-clinic" class="clinic-section py-5 border-bottom">
        <h2 class="fw-bold mb-4">Clinic Facilities & Equipment</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/team-2.png') }}" class="img-fluid rounded-4 shadow-sm w-100 h-100 object-fit-cover" style="min-height: 220px;" alt="Facility">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('assets/images/team-2.png') }}" class="img-fluid rounded-4 shadow-sm w-100 h-100 object-fit-cover" style="min-height: 220px;" alt="Facility">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('assets/images/team-2.png') }}" class="img-fluid rounded-4 shadow-sm w-100 h-100 object-fit-cover" style="min-height: 220px;" alt="Facility">
            </div>
        </div>
    </section>

    <!-- 3. BEFORE & AFTER SECTION -->
    <section id="section-before-after" class="clinic-section py-5 border-bottom">
        <h2 class="fw-bold mb-4">Before & After Transformations</h2>
        <div class="row g-4">
            @forelse($clinic->beforeAfters ?? [] as $case)
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ asset($case->image_url) }}" class="img-fluid" alt="Before and After">
                        <div class="card-body">
                            <h6 class="fw-bold">{{ $case->title }}</h6>
                            <p class="small text-muted mb-0">{{ $case->description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="https://placehold.co/600x400/e2e8f0/1e293b?text=Full+Mouth+Implants+Before/After" class="img-fluid" alt="Before After Case">
                        <div class="card-body">
                            <h6 class="fw-bold">Full Mouth All-on-4 Implants</h6>
                            <p class="small text-muted mb-0">Restored natural chewing function and confidence for international patient.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="https://placehold.co/600x400/e2e8f0/1e293b?text=Porcelain+Veneers+Transformation" class="img-fluid" alt="Before After Case">
                        <div class="card-body">
                            <h6 class="fw-bold">16 Porcelain Veneers Makeover</h6>
                            <p class="small text-muted mb-0">Complete smile redesign with ultra-thin Emax porcelain veneers.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </section>

    <!-- 4. PRICE LIST -->
    <section id="section-price-list" class="clinic-section py-5 border-bottom">
        <h2 class="fw-bold mb-4">Transparent Price List</h2>
        <div class="table-responsive">
            <table class="table table-hover align-middle border">
                <thead class="table-light">
                    <tr>
                        <th>Category</th>
                        <th>Treatment</th>
                        <th>Price (USD)</th>
                        <th>Warranty</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clinic->services as $service)
                        <tr>
                            <td class="fw-bold text-capitalize">{{ $service->category }}</td>
                            <td>{{ $service->name }}</td>
                            <td class="text-danger fw-bold">${{ number_format($service->starting_price) }} {{ $service->unit_name ? '/ '.$service->unit_name : '' }}</td>
                            <td>{{ $service->warranty_years ? $service->warranty_years.' Years' : 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Contact clinic for pricing details.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- 5. TESTIMONIAL -->
    <section id="section-testimonial" class="clinic-section py-5 border-bottom">
        <h2 class="fw-bold mb-4">International Patient Reviews</h2>
        <div class="row g-4">
            @forelse($clinic->testimonials ?? [] as $review)
                <div class="col-md-6">
                    <div class="p-4 bg-light rounded-4 h-100 shadow-sm">
                        <p class="fst-italic text-secondary">"{{ $review->content }}"</p>
                        <div class="fw-bold text-dark">— {{ $review->patient_name }} ({{ $review->country }})</div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted fst-italic mb-0">No patient reviews published yet.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- ==================== BOOKING SECTION (KHÚC CUỐI) ==================== -->
    <section id="booking-section" class="py-5 mt-5 bg-white rounded-4 p-4 p-md-5 shadow-sm border">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Book Online Consultation / Appointment</h2>
            <p class="text-muted">Select your preferred date & time to reserve your consultation with {{ $clinic->name }}</p>
        </div>

        <form action="#" method="POST">
            @csrf
            
            <input type="hidden" name="token" value="{{ $appointment->token ?? '' }}">
            <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="name" class="form-control form-control-lg fs-6" value="{{ $customer->name ?? '' }}" required placeholder="Enter full name">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="email" class="form-control form-control-lg fs-6" value="{{ $customer->email ?? '' }}" required placeholder="name@example.com">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Preferred Appointment Date</label>
                    <input type="date" name="booking_date" class="form-control form-control-lg fs-6" min="{{ date('Y-m-d') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Preferred Time Slot</label>
                    <select name="booking_time" class="form-select form-select-lg fs-6" required>
                        <option value="">-- Choose time slot --</option>
                        <option value="09:00 AM">09:00 AM</option>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="02:00 PM">02:00 PM</option>
                        <option value="04:00 PM">04:00 PM</option>
                    </select>
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow">
                        Confirm & Book Now
                    </button>
                </div>
            </div>
        </form>
    </section>
</div>
    <!-- ==================== HỆ THỐNG CSS TỐI ƯU ==================== -->
    <style>
    /* 1. Thiết lập khoảng đệm chuẩn khi scroll dính thanh sticky tab bar (~120px) */
    html {
        scroll-behavior: smooth;
        scroll-padding-top: 120px;
    }

    /* 2. Thanh Tab dính đỉnh */
    .clinic-sticky-bar {
        position: sticky;
        top: 0;
        z-index: 1020;
        background-color: #ffffff;
    }

    /* 3. Thanh Tab vuốt ngang mượt mà (Horizontal Scroll & Snap) */
    .tab-scroll-wrapper {
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }
    .tab-scroll-wrapper::-webkit-scrollbar {
        display: none;
    }

    .tab-scroll-wrapper .nav-item {
        scroll-snap-align: center;
        flex-shrink: 0;
    }

    .tab-scroll-wrapper .nav-link {
        color: #475569;
        transition: all 0.2s ease;
    }

    .tab-scroll-wrapper .nav-link.active {
        background-color: #0d6efd !important;
        color: #ffffff !important;
    }

    /* Backdrop blur cho các block tag nhỏ */
    .backdrop-blur {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
    </style>


    <!-- ==================== INTERSECTION OBSERVER (LIGHTWEIGHT) ==================== -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // 1. Xử lý click mượt cho nút Book Video Consultation & các thẻ a có href bắt đầu bằng dấu #
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    
                    // Tính toán vị trí chính xác trừ đi chiều cao thanh sticky bar để không bị che khuất
                    const headerOffset = 110;
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                }
            });
        });

        // 2. Intersection Observer cho hệ thống active tab khi cuộn chuột
        const sections = document.querySelectorAll(".clinic-section, #booking-section");
        const navLinks = document.querySelectorAll("#clinicTabNav .nav-link");

        const observerOptions = {
            root: null,
            rootMargin: "-20% 0px -50% 0px",
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute("id");

                    navLinks.forEach((link) => {
                        if (link.getAttribute("data-tab") === id) {
                            link.classList.add("active");
                            link.classList.remove("text-secondary");
                            link.scrollIntoView({ behavior: "smooth", inline: "center", block: "nearest" });
                        } else {
                            link.classList.remove("active");
                            link.classList.add("text-secondary");
                        }
                    });
                }
            });
        }, observerOptions);

        sections.forEach((section) => observer.observe(section));
    });
    </script>
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
</body>
</html>