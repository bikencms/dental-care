<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('clinics.page_title') }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="{{ __('clinics.subheading') }}">
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

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Vietnam Dental Care | {{ __('clinics.page_title') }}">
    <meta name="twitter:description" content="{{ __('clinics.subheading') }}">
    <meta name="twitter:image" content="https://vietnamdentalcare.vn/assets/images/og-image.jpg">

    @if(app()->getLocale() == 'vi')
        <link rel="canonical" href="https://vietnamdentalcare.vn/vi/clinics">
    @else
        <link rel="canonical" href="https://vietnamdentalcare.vn/clinics">
    @endif

    <link rel="alternate" hreflang="en" href="https://vietnamdentalcare.vn/clinics">
    <link rel="alternate" hreflang="vi" href="https://vietnamdentalcare.vn/vi/clinics">
    <link rel="alternate" hreflang="x-default" href="https://vietnamdentalcare.vn/clinics">

    <meta name="robots" content="index, follow, max-image-preview:large">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans text-slate-700 antialiased">
<!-- ==================== HERO SECTION (Style Denture - No Right White Box) ==================== -->
<section class="hero-clinic-section position-relative text-white d-flex align-items-center py-5" 
         style="background: linear-gradient(rgba(15, 23, 42, 0.78), rgba(15, 23, 42, 0.78)), url('{{ asset($clinic->cover_image ?? 'assets/images/default-hero.jpg') }}') center/cover no-repeat; min-height: 520px;">
    <div class="container py-4">
        <div class="row">
            {{-- Đã bỏ hoàn toàn khung trắng bên phải --}}
            <div class="col-lg-10 col-xl-9">
                
                {{-- [CLINIC NAME FROM DB] --}}
                <h1 class="display-4 fw-bold text-white mb-3 text-uppercase tracking-tight">
                    {{ $clinic->name }}
                </h1>

                {{-- [THÔNG TIN ĐỊA LÝ & ĐÁNH GIÁ GOOGLE MAP] --}}
                <div class="d-flex flex-wrap align-items-center gap-2 gap-md-3 fs-5 mb-3 text-light">
                    <span class="d-flex align-items-center gap-1">
                        📍 {{ $clinic->district }}, Ho Chi Minh City, Vietnam
                    </span>
                    <span class="opacity-50">|</span>
                    <span class="text-warning fw-semibold d-flex align-items-center gap-1">
                        ⭐ {{ $clinic->rating ?? '4.9' }}/5 ({{ $clinic->reviews_count ?? '200+' }} International Reviews)
                    </span>
                </div>

                {{-- Đoạn văn khoảng 3 câu miêu tả lấy từ DB --}}
                <p class="lead text-light opacity-90 mb-4 lh-base" style="max-width: 800px;">
                    {{ $clinic->description ?? 'Welcome to our international standard dental clinic equipped with advanced modern technology. Our team of highly experienced specialists provides pain-free, world-class treatments tailored for overseas patients. Enjoy full English support and transparent pricing for your entire dental care journey.' }}
                </p>

                {{-- Các Block Tag nhỏ lấy từ DB --}}
                <div class="d-flex flex-wrap gap-2 mb-4">
                    @forelse($clinic->tags as $tag)
                        <div class="tag-item bg-white bg-opacity-10 text-white px-3 py-2 rounded-3 fs-6 backdrop-blur">
                            ✓ {{ $tag->name }}
                        </div>
                    @empty
                        <div class="tag-item bg-white bg-opacity-10 text-white px-3 py-2 rounded-3 fs-6">✓ Free Digital Scan</div>
                        <div class="tag-item bg-white bg-opacity-10 text-white px-3 py-2 rounded-3 fs-6">✓ 10-Year Warranty</div>
                        <div class="tag-item bg-white bg-opacity-10 text-white px-3 py-2 rounded-3 fs-6">✓ Airport Pick-up</div>
                    @endforelse
                </div>

                {{-- Nút BOOK VIDEO CONSULTATION --}}
                <div class="pt-2">
                    <a href="#booking-section" class="btn btn-primary btn-lg px-4 py-3 rounded-pill fw-bold text-uppercase shadow-lg">
                        📅 BOOK VIDEO CONSULTATION
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- ==================== STICKY & HORIZONTAL SCROLLABLE TAB BAR ==================== -->
<nav class="clinic-sticky-bar bg-white border-bottom shadow-sm">
    <div class="container">
        <div class="tab-scroll-wrapper">
            <ul class="nav nav-pills flex-nowrap" id="clinicTabNav">
                <li class="nav-item">
                    <a class="nav-link active" href="#section-doctors" data-tab="section-doctors">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section-clinic" data-tab="section-clinic">Clinic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section-before-after" data-tab="section-before-after">Before & After</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section-price-list" data-tab="section-price-list">Price List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#section-testimonial" data-tab="section-testimonial">Testimonial</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- ==================== MAIN CONTENT SECTIONS ==================== -->
<div class="container py-4">

    <!-- 1. DOCTORS -->
    <section id="section-doctors" class="clinic-section py-5 border-bottom">
        <h2 class="fw-bold mb-4">Dental Specialists</h2>
        <div class="row g-4">
            @forelse($clinic->doctors as $doctor)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-3">
                        <img src="{{ asset($doctor->avatar ?? 'assets/images/doctor-default.jpg') }}" class="card-img-top rounded-3 object-fit-cover" style="height: 260px;" alt="{{ $doctor->name }}">
                        <div class="card-body px-0 pb-0">
                            <h5 class="fw-bold mb-1">{{ $doctor->name }}</h5>
                            <p class="text-primary small mb-2">{{ $doctor->title }}</p>
                            <p class="text-muted small mb-0">{{ $doctor->bio }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">No doctor information available.</p>
            @endforelse
        </div>
    </section>

    <!-- 2. CLINIC -->
    <section id="section-clinic" class="clinic-section py-5 border-bottom">
        <h2 class="fw-bold mb-4">Clinic Facilities & Equipment</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/facility-1.jpg') }}" class="img-fluid rounded-4 shadow-sm w-100 h-100 object-fit-cover" style="min-height: 220px;" alt="Facility">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('assets/images/facility-2.jpg') }}" class="img-fluid rounded-4 shadow-sm w-100 h-100 object-fit-cover" style="min-height: 220px;" alt="Facility">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('assets/images/facility-3.jpg') }}" class="img-fluid rounded-4 shadow-sm w-100 h-100 object-fit-cover" style="min-height: 220px;" alt="Facility">
            </div>
        </div>
    </section>

    <!-- 3. BEFORE & AFTER SECTION -->
    <section id="section-before-after" class="clinic-section py-5 border-bottom">
        <h2 class="fw-bold mb-4">Before & After Transformations</h2>
        <div class="row g-4">
            {{-- Dùng optional() hoặc null coalescing (?? []) để tránh đứt trang --}}
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
                {{-- Nếu không có dữ liệu trong DB thì hiển thị khung Placeholder mẫu cực đẹp --}}
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
            {{-- Thêm ?? [] để an toàn tuyệt đối --}}
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

    <!-- ==================== BOOKING SECTION (SECTION KHÚC CUỐI) ==================== -->
    <section id="booking-section" class="py-5 mt-5 bg-light rounded-4 p-4 p-md-5 shadow-sm border">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Book Online Consultation / Appointment</h2>
            <p class="text-muted">Select your preferred date & time to reserve your consultation with {{ $clinic->name }}</p>
        </div>

        <form action="#" method="POST">
            @csrf
            
            {{-- LƯU SẴN THÔNG TIN KHÁCH TỪ TOKEN & CLINIC ID VÀO DB --}}
            <input type="hidden" name="token" value="{{ $appointment->token }}">
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


<!-- ==================== CSS CẤU HÌNH THEO ĐÚNG "BỘ CÔNG THỨC" ==================== -->
<style>
/* 1. Cuộn trang mượt (Smooth Scroll) thuần CSS */
html {
    scroll-behavior: smooth;
    scroll-padding-top: 80px; /* Offset khoảng cách tránh bị đè bởi Sticky Bar */
}

/* 2. Thanh Tab dính đỉnh (Sticky Bar) */
.clinic-sticky-bar {
    position: sticky;
    top: 0;
    z-index: 1020;
    background-color: #ffffff;
}

/* 3. Thanh Tab vuốt ngang (Horizontal Scroll) */
.tab-scroll-wrapper {
    overflow-x: auto;
    scroll-snap-type: x mandatory; /* Snap tab vào đúng tâm */
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none; /* Ẩn thanh cuộn trên Firefox */
}
.tab-scroll-wrapper::-webkit-scrollbar {
    display: none; /* Ẩn thanh cuộn trên Chrome/Safari */
}

.tab-scroll-wrapper .nav {
    padding: 10px 0;
    gap: 10px;
}

.tab-scroll-wrapper .nav-item {
    scroll-snap-align: center; /* Tự động hít vào tâm khi thả ngón tay */
}

.tab-scroll-wrapper .nav-link {
    color: #475569;
    font-weight: 600;
    border-radius: 50px;
    padding: 8px 24px;
    white-space: nowrap;
    transition: all 0.2s ease;
}

.tab-scroll-wrapper .nav-link.active {
    background-color: #0d6efd;
    color: #ffffff !important;
}

/* Backdrop blur cho các Tag trên Hero Banner */
.backdrop-blur {
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}
</style>


<!-- ==================== JAVASCRIPT: INTERSECTION OBSERVER (NO LAG/NO STUTTER) ==================== -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll(".clinic-section");
    const navLinks = document.querySelectorAll("#clinicTabNav .nav-link");

    // 4. Scrollspy dùng IntersectionObserver API (Siêu nhẹ, không tốn pin/không gây lag)
    const observerOptions = {
        root: null,
        rootMargin: "-20% 0px -60% 0px", // Nhận biết chính xác section nằm giữa màn hình
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute("id");

                navLinks.forEach((link) => {
                    if (link.getAttribute("data-tab") === id) {
                        link.classList.add("active");
                        
                        // Tự động cuộn thanh Tab nằm ngang để Tab active nằm chính giữa màn hình
                        link.scrollIntoView({ behavior: "smooth", inline: "center", block: "nearest" });
                    } else {
                        link.classList.remove("active");
                    }
                });
            }
        });
    }, observerOptions);

    sections.forEach((section) => observer.observe(section));
});
</script>

</body>
</html>