@extends('layouts.guest')
@section('title', $clinic->name)
@section('description', $clinic->description)

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
                                    {{ __('clinics.book_video_consultation') }}
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

    <!-- Our Transformation Section Start -->
    <div class="our-transformation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Our Transformation Box Start -->
                    <div class="our-transformation-box tab-content wow fadeInUp" data-wow-delay="0.2s" id="myTabContent">
                        <!-- Sidebar Our Transformation Nav start -->
                        <div class="our-transformation-nav">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="one-tab" data-bs-toggle="tab" data-bs-target="#one" type="button" role="tab" aria-selected="true"><img src="{{ asset('assets/images/icon-transformation-nav-3.svg') }}" alt="">{{ __('clinics.tab_doctors') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="two-tab" data-bs-toggle="tab" data-bs-target="#two" type="button" role="tab" aria-selected="false"><img src="{{ asset('assets/images/icon-transformation-nav-1.svg') }}" alt="">{{ __('clinics.tab_clinic') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="three-tab" data-bs-toggle="tab" data-bs-target="#three" type="button" role="tab" aria-selected="false"><img src="{{ asset('assets/images/icon-transformation-nav-1.svg') }}" alt="">{{ __('clinics.tab_before_after') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="four-tab" data-bs-toggle="tab" data-bs-target="#four" type="button" role="tab" aria-selected="false"><img src="{{ asset('assets/images/icon-transformation-nav-2.svg') }}" alt="">{{ __('clinics.tab_price_list') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="five-tab" data-bs-toggle="tab" data-bs-target="#five" type="button" role="tab" aria-selected="false"><img src="{{ asset('assets/images/icon-transformation-nav-4.svg') }}" alt="">{{ __('clinics.tab_testimonial') }}</button>
                                </li>
                            </ul>
                        </div>
                        <!-- Sidebar Our Transformation Nav End -->

                        <!-- Our Transformation Item Start -->
                        <div class="transformation-tab-item tab-pane fade show active" id="one" role="tabpanel">
                            <!-- Transformation Image Box Start -->
                            <div class="transformation-image-box">
                                <!-- 1. DOCTORS -->
                                <section id="section-doctors" class="clinic-section border-bottom">
                                    <!-- Our Team Start -->
                                    <div class="our-team">
                                        <div class="container">
                                            <div class="row section-row">
                                                <div class="col-lg-12">
                                                    <!-- Section Title Start -->
                                                    <div class="section-title section-title-center">
                                                        <h3 class="wow fadeInUp">{{ __('clinics.meet_experts_subtitle') }}</h3>
                                                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('clinics.meet_experts_title') }}</h2>
                                                    </div>
                                                    <!-- Section Title End -->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Slider Setup: Thêm class carousel, swiper, hoặc owl-carousel tùy thuộc vào thư viện JS bạn đang dùng (ở đây ví dụ dùng cấu trúc Swiper cơ bản hoặc chung cho Bootstrap carousel) -->
                                                    <div class="testimonial-slider overflow-hidden pb-4">
                                                        <div class="swiper">
                                                            <div class="swiper-wrapper" data-cursor-text="Drag">
                                                                @forelse($clinic->doctors as $doctor)
                                                                    <div class="swiper-slide h-auto">
                                                                        <!-- Team Item Start -->
                                                                        <div class="team-item card border-0 shadow-sm rounded-4 overflow-hidden h-100 bg-white">
                                                                            <!-- Doctor Image & Socials -->
                                                                            <div class="team-image box-bg-shape position-relative overflow-hidden">
                                                                                <figure class="m-0">
                                                                                    @if($doctor->avatar)
                                                                                        <img src="{{ asset('storage/' . $doctor->avatar) }}" alt="{{ $doctor->name }}" class="w-100 object-fit-cover" style="height: 320px;">
                                                                                    @else
                                                                                        <img src="{{ asset('assets/images/team-1.png') }}" alt="{{ $doctor->name }}" class="w-100 object-fit-cover" style="height: 320px;">
                                                                                    @endif
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
                                                                            <div class="team-content p-3">
                                                                                
                                                                                <!-- Doctor Name & Title -->
                                                                                <h3 class="fw-bold mb-1 fs-5">
                                                                                    <a href="#" class="text-dark text-decoration-none hover-primary" data-cursor="-opaque">{{ $doctor->name }}</a>
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
                                                                                        <span class="small text-muted"><img src="https://flagcdn.com/20x15/us.png" alt="US Flag" class="align-middle"> | <img src="https://flagcdn.com/20x15/vn.png" alt="VN Flag" class="align-middle"></span>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Top Credentials (Highlights) -->
                                                                                <div class="mb-3">
                                                                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 small fw-semibold" style="font-size: 10px;">
                                                                                        🏆 USC Trained | MALO CLINIC ALL-ON-4™
                                                                                    </span>
                                                                                </div>

                                                                                <!-- Accordion / Collapsible Details -->
                                                                                <div class="accordion accordion-flush" id="docAccordion{{ $loop->index ?? '1' }}">
                                                                                    <div class="accordion-item bg-transparent border-0">
                                                                                        <button style="font-size: 18px; line-height: 22px" class="accordion-button collapsed p-0 bg-transparent shadow-none text-primary fw-bold small" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDoc{{ $loop->index ?? '1' }}">
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
                                                                    <div class="col-12">
                                                                        <p class="text-muted">{{ __('clinics.no_doctor_available') }}</p>
                                                                    </div>
                                                                    @endforelse
                                                            </div>
                                                            <!-- Pagination / Navigation nếu cần -->
                                                            <div class="testimonial-pagination"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Our Team End -->

                                </section>
                            </div>
                            <!-- Transformation Image Box End -->
                        </div>
                        <!-- Our Transformation Item End -->

                        <!-- Our Transformation Item Start -->
                        <div class="transformation-tab-item tab-pane fade" id="two" role="tabpanel">
                            <!-- Transformation Image Box Start -->
                            <div class="transformation-image-box">
                                <div class="our-approach bg-section">
                                    <div class="container">
                                        <div class="row section-row">
                                            <div class="col-lg-12">
                                                <!-- Section Title Start -->
                                                <div class="section-title section-title-center">
                                                    <h3 class="wow fadeInUp">{{ __('clinics.facilities_subtitle') }}</h3>
                                                    <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('clinics.facilities_title') }}</h2>
                                                </div>
                                                <!-- Section Title End -->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <!-- Approach Item Start -->
                                                <div class="approach-item box-bg-shape wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                                    <div class="approach-item-content">
                                                        <h3>{{ __('clinics.tech_heading') }}</h3>
                                                        <p>{{ __('clinics.tech_desc') }}</p>
                                                    </div>
                                                    <div class="approach-item-list">
                                                        <ul>
                                                            <li>{{ __('clinics.tech_list_1') }}</li>
                                                            <li>{{ __('clinics.tech_list_2') }}</li>
                                                            <li>{{ __('clinics.tech_list_3') }}</li>
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
                                                <div class="approach-item box-bg-shape wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                                    <div class="approach-item-content">
                                                        <h3>{{ __('clinics.infection_heading') }}</h3>
                                                        <p>{{ __('clinics.infection_desc') }}</p>
                                                    </div>
                                                    <div class="approach-item-list">
                                                        <ul>
                                                            <li>{{ __('clinics.infection_list_1') }}</li>
                                                            <li>{{ __('clinics.infection_list_2') }}</li>
                                                            <li>{{ __('clinics.infection_list_3') }}</li>
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
                                                <div class="approach-item box-bg-shape wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                                                    <div class="approach-item-content">
                                                        <h3>{{ __('clinics.value_heading') }}</h3>
                                                        <p>{{ __('clinics.value_desc') }}</p>
                                                    </div>
                                                    <div class="approach-item-list">
                                                        <ul>
                                                            <li>{{ __('clinics.value_list_1') }}</li>
                                                            <li>{{ __('clinics.value_list_2') }}</li>
                                                            <li>{{ __('clinics.value_list_3') }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="icon-box">
                                                        <img src="{{ asset('assets/images/icon-approach-3.svg') }}" alt="">
                                                    </div>
                                                </div>
                                                <!-- Approach Item End -->
                                            </div>

                                            <div class="col-lg-12">
                                                <!-- Section Footer Text Start -->
                                                <div class="section-footer-text wow fadeInUp" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                                                    <p>{{ __('clinics.footer_text_part1') }} <a href="{{ localized_route('contact-us') }}">{{ __('clinics.footer_contact_link') }}</a></p>
                                                </div>
                                                <!-- Section Footer Text End -->
                                            </div>
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
                                <!-- 3. BEFORE & AFTER SECTION -->
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="{{ asset('assets/images/transformation-img-before-4.jpg') }}" alt="">
                                            <img src="{{ asset('assets/images/transformation-img-after-4.jpg') }}" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="{{ asset('assets/images/transformation-img-before-5.jpg') }}" alt="">
                                            <img src="{{ asset('assets/images/transformation-img-after-5.jpg') }}" alt="">
                                        </div>
                                        <!-- Transformation Image End -->
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <!-- Transformation Image Start -->
                                        <div class="transformation_image">					
                                            <img src="{{ asset('assets/images/transformation-img-before-6.jpg') }}" alt="">
                                            <img src="{{ asset('assets/images/transformation-img-after-6.jpg') }}" alt="">
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
                                <!-- 4. PRICE LIST -->
                                <section id="section-price-list" class="clinic-section border-bottom">
                                    <h2 class="fw-bold mb-4">{{ __('clinics.price_list_title') }}</h2>
                                    
                                    @php
                                        // Dùng optional() / collect() để tránh lỗi null khi clinic chưa có procedures
                                        $groupedProcedures = collect(optional($clinic)->procedures)->groupBy('service_id');
                                    @endphp

                                    <div class="card border-0 shadow-sm">
                                        <div class="card-header bg-white py-3">
                                            <h5 class="mb-0 fw-bold text-primary">{{ __('clinics.services_and_procedures') }}</h5>
                                        </div>
                                        
                                        <div class="card-body p-3">
                                            <div class="accordion" id="clinicServicesAccordion">
                                                @forelse($groupedProcedures as $serviceId => $procedures)
                                                    @php
                                                        $service = optional($procedures->first())->service;
                                                        $isFirstThree = $loop->iteration <= 3;
                                                        $collapseId = 'collapse-service-' . $serviceId;
                                                        $headingId = 'heading-service-' . $serviceId;
                                                    @endphp

                                                    <div class="accordion-item mb-3 border rounded shadow-sm {{ !$isFirstThree ? 'extra-service d-none' : '' }}">
                                                        <h2 class="accordion-header" id="{{ $headingId }}">
                                                            <button class="accordion-button collapsed fw-bold text-dark fs-6" 
                                                                    type="button" 
                                                                    data-bs-toggle="collapse" 
                                                                    data-bs-target="#{{ $collapseId }}" 
                                                                    aria-expanded="false" 
                                                                    aria-controls="{{ $collapseId }}">
                                                                <div class="d-flex align-items-center justify-content-between w-100 me-3">
                                                                    <span>{{ $service->name ?? __('clinics.other_service') }}</span>
                                                                    @if(isset($service->category))
                                                                        <span class="badge bg-secondary fw-normal me-2">{{ $service->category }}</span>
                                                                    @endif
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        
                                                        <div id="{{ $collapseId }}" 
                                                            class="accordion-collapse collapse" 
                                                            aria-labelledby="{{ $headingId }}" 
                                                            data-bs-parent="#clinicServicesAccordion">
                                                            <div class="accordion-body p-0">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover align-middle mb-0">
                                                                        <thead class="table-light">
                                                                            <tr>
                                                                                <th scope="col" class="ps-3" style="width: 50%;">{{ __('clinics.procedure_name') }}</th>
                                                                                <th scope="col" style="width: 25%;">{{ __('clinics.duration') }}</th>
                                                                                <th scope="col" class="text-end pe-3" style="width: 25%;">{{ __('clinics.price') }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($procedures as $procedure)
                                                                                <tr>
                                                                                    <td class="ps-3 fw-semibold text-secondary">
                                                                                        {{ $procedure->procedure_name }}
                                                                                    </td>
                                                                                    <td>
                                                                                        <span class="badge bg-light text-dark border">
                                                                                            <i class="bi bi-clock me-1"></i>{{ $procedure->procedure_duration ?? __('clinics.not_available') }}
                                                                                        </span>
                                                                                    </td>
                                                                                    <td class="text-end pe-3 fw-bold text-danger">
                                                                                        {{ number_format($procedure->procedure_price, 0, ',', '.') }} VNĐ
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="text-center py-4 text-muted">
                                                        {{ __('clinics.no_data') }}
                                                    </div>
                                                @endforelse
                                            </div>

                                            {{-- Nút "Xem thêm" nếu số lượng dịch vụ > 3 --}}
                                            @if($groupedProcedures->count() > 3)
                                                <div class="text-center mt-3">
                                                    <button type="button" id="btnToggleServices" class="btn btn-outline-primary fw-semibold px-4">
                                                        {{ __('clinics.show_more', ['count' => $groupedProcedures->count() - 3]) }} <i class="bi bi-chevron-down ms-1"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- JavaScript xử lý bấm Xem thêm / Thu gọn -->
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const btnToggle = document.getElementById('btnToggleServices');
                                            if (btnToggle) {
                                                let isExpanded = false;
                                                const extraServices = document.querySelectorAll('.extra-service');

                                                const textShowMore = "{{ __('clinics.show_more', ['count' => $groupedProcedures->count() - 3]) }}";
                                                const textShowLess = "{{ __('clinics.show_less') }}";

                                                btnToggle.addEventListener('click', function () {
                                                    isExpanded = !isExpanded;
                                                    
                                                    extraServices.forEach(item => {
                                                        item.classList.toggle('d-none', !isExpanded);
                                                    });

                                                    if (isExpanded) {
                                                        btnToggle.innerHTML = textShowLess + ' <i class="bi bi-chevron-up ms-1"></i>';
                                                    } else {
                                                        btnToggle.innerHTML = textShowMore + ' <i class="bi bi-chevron-down ms-1"></i>';
                                                    }
                                                });
                                            }
                                        });
                                    </script>
                                </section>
                            </div>
                            <!-- Transformation Image Box End -->
                        </div>
                        <!-- Our Transformation Item End -->
                        
                        <!-- Our Transformation Item Start -->
                        <div class="transformation-tab-item tab-pane fade" id="five" role="tabpanel">
                            <!-- Transformation Image Box Start -->
                            <div class="transformation-image-box">
                                <!-- Our Testimonial Section Start -->
                                <div class="our-testimonial bg-section">
                                    <div class="container">
                                        <div class="row section-row align-items-center">
                                            <div class="col-lg-12">
                                                <!-- Section Title Start -->
                                                <div class="section-title section-title-center">
                                                    <h3 class="wow fadeInUp">{{ __('clinics.testimonial_subtitle') }}</h3>
                                                    <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('clinics.testimonial_title') }}</h2>
                                                </div>
                                                <!-- Section Title End -->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <!-- Testimonial Slider Start -->
                                                <div class="testimonial-slider">
                                                    <div class="swiper">
                                                        <div class="swiper-wrapper" data-cursor-text="{{ __('clinics.swiper_drag') }}">
                                                            @forelse($clinic->testimonials ?? [] as $testimonial)
                                                                <!-- Testimonial Slide Start -->
                                                                <div class="swiper-slide">
                                                                    <div class="testimonial-item">
                                                                        <div class="testimonial-item-header">
                                                                            <div class="testimonial-rating">
                                                                                @for($i = 0; $i < ($testimonial->rating ?? 5); $i++)
                                                                                    <i class="fa-solid fa-star"></i>
                                                                                @endfor
                                                                            </div>                           
                                                                            <div class="testimonial-content">
                                                                                <p>"{!! $testimonial->content !!}"</p>
                                                                            </div>
                                                                        </div>                                       
                                                                        <div class="testimonial-body">
                                                                            <div class="testimonial-author">
                                                                                <div class="author-image">
                                                                                    <figure class="image-anime">
                                                                                        <img src="{{ $testimonial->image_url ?? asset('images/default-author.jpg') }}" alt="{{ $testimonial->name }}">
                                                                                    </figure>
                                                                                </div>
                                                                                <div class="author-content">
                                                                                    <h3>{{ $testimonial->name }}</h3>
                                                                                    <p>{{ $testimonial->position }}</p>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="testimonial-quote">
                                                                                <img src="{{ asset('images/testimonial-quote.svg') }}" alt="">
                                                                            </div>                                       
                                                                        </div>                                       
                                                                    </div>
                                                                </div>
                                                                <!-- Testimonial Slide End -->
                                                            @empty
                                                            <!-- Fallback Slide if no data -->
                                                            <div class="swiper-slide">
                                                                <div class="testimonial-item">
                                                                    <div class="testimonial-item-header">
                                                                        <div class="testimonial-rating">
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                        </div>                           
                                                                        <div class="testimonial-content">
                                                                            <p>"{{ __('clinics.default_testimonial_content') }}"</p>
                                                                        </div>
                                                                    </div>                                       
                                                                    <div class="testimonial-body">
                                                                        <div class="testimonial-author">
                                                                            <div class="author-image">
                                                                                <figure class="image-anime">
                                                                                    <img src="{{ asset('assets/images/author-1.jpg') }}" alt="">
                                                                                </figure>
                                                                            </div>
                                                                            <div class="author-content">
                                                                                <h3>{{ __('clinics.default_author_name') }}</h3>
                                                                                <p>{{ __('clinics.default_author_position') }}</p>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="testimonial-quote">
                                                                            <img src="{{ asset('assets/images/testimonial-quote.svg') }}" alt="">
                                                                        </div>                                       
                                                                    </div>                                       
                                                                </div>
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <div class="testimonial-item">
                                                                    <div class="testimonial-item-header">
                                                                        <div class="testimonial-rating">
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                        </div>                              
                                                                        <div class="testimonial-content">
                                                                            <p>"The team is amazing! They made me feel comfortable and explained every step. My smile has never looked better."</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="testimonial-body">
                                                                        <div class="testimonial-author">
                                                                            <div class="author-image">
                                                                                <figure class="image-anime">
                                                                                    <img src="{{ asset('assets/images/author-2.jpg') }}" alt="">
                                                                                </figure>
                                                                            </div>
                                                                            <div class="author-content">
                                                                                <h3>Dr. Bessie Cooper</h3>
                                                                                <p>Orthodontist</p>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="testimonial-quote">
                                                                            <img src="{{ asset('assets/images/testimonial-quote.svg') }}" alt="">
                                                                        </div>                                              
                                                                    </div>                                  
                                                                </div>
                                                            </div>
                                                            <!-- Testimonial Slide End -->

                                                            <!-- Testimonial Slide Start -->
                                                            <div class="swiper-slide">
                                                                <div class="testimonial-item">
                                                                    <div class="testimonial-item-header">
                                                                        <div class="testimonial-rating">
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                        </div>                              
                                                                        <div class="testimonial-content">
                                                                            <p>"The team is amazing! They made me feel comfortable and explained every step. My smile has never looked better."</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="testimonial-body">
                                                                        <div class="testimonial-author">
                                                                            <div class="author-image">
                                                                                <figure class="image-anime">
                                                                                    <img src="{{ asset('assets/images/author-3.jpg') }}" alt="">
                                                                                </figure>
                                                                            </div>
                                                                            <div class="author-content">
                                                                                <h3>Dr. Kristin Watson</h3>
                                                                                <p>Consultant Dentist</p>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="testimonial-quote">
                                                                            <img src="{{ asset('assets/images/testimonial-quote.svg') }}" alt="">
                                                                        </div>                                              
                                                                    </div>                                   
                                                                </div>
                                                            </div>
                                                            <!-- Testimonial Slide End -->

                                                            <!-- Testimonial Slide Start -->
                                                            <div class="swiper-slide">
                                                                <div class="testimonial-item">
                                                                    <div class="testimonial-item-header">
                                                                        <div class="testimonial-rating">
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                        </div>                              
                                                                        <div class="testimonial-content">
                                                                            <p>"The team is amazing! They made me feel comfortable and explained every step. My smile has never looked better."</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="testimonial-body">
                                                                        <div class="testimonial-author">
                                                                            <div class="author-image">
                                                                                <figure class="image-anime">
                                                                                    <img src="{{ asset('assets/images/author-4.jpg') }}" alt="">
                                                                                </figure>
                                                                            </div>
                                                                            <div class="author-content">
                                                                                <h3>Dr. Cody Fisher</h3>
                                                                                <p>Pediatric Dentist</p>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="testimonial-quote">
                                                                            <img src="{{ asset('assets/images/testimonial-quote.svg') }}" alt="">
                                                                        </div>                                              
                                                                    </div>                                   
                                                                </div>
                                                            </div>
                                                            <!-- Testimonial Slide End -->
                                                            @endforelse
                                                        </div>
                                                        <div class="testimonial-pagination"></div>
                                                    </div>
                                                </div>
                                                <!-- Testimonial Slider End -->
                                            </div>

                                            <div class="col-lg-12">
                                                <!-- Section Footer Text Start -->
                                                <div class="section-footer-text wow fadeInUp" data-wow-delay="0.2s">
                                                    <ul>
                                                        <li><span class="counter">4.9</span>/5</li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li>{{ __('clinics.patient_reviews_count') }}</li>
                                                    </ul>
                                                </div>
                                                <!-- Section Footer Text End -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Our Testimonial Section End -->
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

    <!-- ==================== MAIN CONTENT SECTIONS ==================== -->
    <div class="container">
        <!-- ==================== BOOKING SECTION (KHÚC CUỐI) ==================== -->
        <section id="booking-section" class="py-5 mt-5 bg-white rounded-4 p-4 p-md-5 shadow-sm border mb-4">
            <div class="text-center mb-4">
                <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('appointment.booking_title') }}</h2>
                <p class="text-muted">{{ __('appointment.booking_subtitle', ['clinic_name' => $clinic->name]) }}</p>
            </div>

            <div id="booking-container">
                <!-- Khung hiển thị thông báo chung -->
                <div id="form-alert" class="d-none alert mb-3" role="alert"></div>

                <!-- 1. MÀN HÌNH DANH SÁCH LỊCH ĐÃ ĐẶT -->
                @php
                    $appointmentsList = $existingAppointments ?? ( $appointment  ? collect([$appointment]) : collect([]));
                @endphp

                <div id="booked-success-section" class="{{ $appointmentsList->isNotEmpty() ? '' : 'd-none' }}">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-primary text-white text-center py-3">
                            <i class="fas fa-check-circle fs-3 mb-1"></i>
                            <h5 class="mb-0 fw-bold text-white">{{ __('appointment.booked_info_header') }}</h5>
                        </div>
                        <div class="card-body p-4">
                            <p class="text-center text-muted fs-7 mb-4">
                                {{ __('appointment.booked_info_desc') }}
                            </p>

                            <div class="table-responsive">
                                <table class="table table-hover align-middle border mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('appointment.table_fullname') }}</th>
                                            <th>{{ __('appointment.table_email') }}</th>
                                            <th>{{ __('appointment.table_timezone') }}</th>
                                            <th>{{ __('appointment.table_datetime') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="booked-appointments-tbody">
                                        @foreach($appointmentsList as $item)
                                            <tr>
                                                <td class="fw-semibold">{{ $item->fullname ?? $item->patient_name ?? 'N/A' }}</td>
                                                <td>{{ $item->email ?? $item->patient_email ?? 'N/A' }}</td>
                                                <td><small class="badge bg-light text-dark border">{{ $item->patient_timezone ?? 'Asia/Ho_Chi_Minh' }}</small></td>
                                                <td>
                                                    <strong class="text-primary">
                                                        {{ $item->appointment_date ?? 'N/A' }} 
                                                        ({{ $item->start_time ?? 'N/A' }})
                                                    </strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. FORM ĐĂNG KÝ ĐẶT LỊCH -->
                <form id="booking-form" class="{{ $appointmentsList->isNotEmpty() ? 'd-none' : '' }}" novalidate>
                    @csrf
                    
                    <input type="hidden" name="token" value="{{ $appointment->token ?? '' }}">
                    <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">
                    <input type="hidden" name="service_type" value="{{ in_array('dental_implants', (array)($appointment->interest ?? [])) ? 'implant' : 'veneers' }}">
                    
                    <input type="hidden" name="patient_phone" value="{{ $appointment->phone ?? $appointment->patient_phone ?? 'N/A' }}">
                    <input type="hidden" name="start_time" id="start_time" required>

                    <div class="row g-3">
                        <!-- 1. Họ và tên -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">{{ __('appointment.label_fullname') }} <span class="text-danger">*</span></label>
                            <input type="text" name="patient_name" id="input_patient_name" class="form-control form-control-lg fs-6" 
                                value="{{ $appointment->fullname ?? $appointment->patient_name ?? '' }}" required placeholder="{{ __('appointment.placeholder_fullname') }}">
                            <div class="invalid-feedback" id="error_patient_name"></div>
                        </div>

                        <!-- 2. Email -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">{{ __('appointment.label_email') }} <span class="text-danger">*</span></label>
                            <input type="email" name="patient_email" id="input_patient_email" class="form-control form-control-lg fs-6" 
                                value="{{ $appointment->email ?? $appointment->patient_email ?? '' }}" required placeholder="{{ __('appointment.placeholder_email') }}">
                            <div class="invalid-feedback" id="error_patient_email"></div>
                        </div>

                        <!-- 3. Bộ chọn Múi Giờ -->
                        <div class="col-md-6">
                            <label for="user_timezone" class="form-label fw-semibold d-flex justify-content-between align-items-center">
                                <span>🌐 {{ __('appointment.label_timezone') }}</span>
                                <span class="badge bg-primary-subtle text-primary border rounded-pill fs-7" id="detected-tz-badge">{{ __('appointment.auto_detected') }}</span>
                            </label>
                            <select id="user_timezone" name="patient_timezone" class="form-select form-select-lg fs-6" required>
                                <option value="Asia/Ho_Chi_Minh">Asia/Ho Chi Minh (GMT+07:00) - ICT</option>
                                <option value="America/Los_Angeles">America/Los Angeles (GMT-08:00/07:00) - PST/PDT</option>
                                <option value="America/New_York">America/New York (GMT-05:00/04:00) - EST/EDT</option>
                                <option value="Australia/Sydney">Australia/Sydney (GMT+10:00/11:00) - AEST/AEDT</option>
                                <option value="Australia/Perth">Australia/Perth (GMT+08:00) - AWST</option>
                                <option value="Europe/Berlin">Europe/Berlin (GMT+01:00/02:00) - CET/CEST</option>
                                <option value="Europe/London">Europe/London (GMT+00:00/01:00) - GMT/BST</option>
                                <option value="Asia/Singapore">Asia/Singapore (GMT+08:00) - SGT</option>
                                <option value="Asia/Tokyo">Asia/Tokyo (GMT+09:00) - JST</option>
                            </select>
                            <div class="invalid-feedback" id="error_patient_timezone"></div>
                        </div>

                        <!-- 4. Chọn Ngày Khám -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">{{ __('appointment.label_date') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fa-regular fa-calendar text-muted"></i></span>
                                <input type="text" id="booking_date_picker" name="appointment_date" class="form-control form-control-lg fs-6 bg-white" placeholder="{{ __('appointment.placeholder_date') }}" readonly required>
                            </div>
                            <div class="invalid-feedback d-block" id="error_appointment_date"></div>
                        </div>

                        <!-- Thông báo Múi giờ -->
                        <div class="col-12">
                            <div class="alert alert-info border-0 bg-info-subtle text-info-emphasis d-flex align-items-center gap-2 mb-0 py-2 px-3 rounded-3 fs-7">
                                <i class="fas fa-info-circle fs-5"></i>
                                <span>{!! __('appointment.working_hours_notice') !!}</span>
                            </div>
                        </div>

                        <!-- 5. Chọn Khung Giờ Khám -->
                        <div class="col-12">
                            <label class="form-label fw-semibold">{{ __('appointment.label_time') }} <span class="text-danger">*</span></label>
                            
                            <div id="slots-loading" class="text-center py-4 d-none">
                                <div class="spinner-border text-primary spinner-border-sm" role="status"></div>
                                <span class="ms-2 text-muted fs-7">{{ __('appointment.loading_slots') }}</span>
                            </div>

                            <div id="slots-container" class="row g-2">
                                <div class="col-12 text-muted text-center py-3 fs-7 border rounded bg-light">
                                    {{ __('appointment.select_date_prompt') }}
                                </div>
                            </div>
                            <div class="invalid-feedback d-block" id="error_start_time"></div>
                        </div>

                        <!-- 6. Ghi chú -->
                        <div class="col-12">
                            <label class="form-label fw-semibold">{{ __('appointment.label_notes') }}</label>
                            <textarea name="notes" id="input_notes" class="form-control fs-6" rows="3" placeholder="{{ __('appointment.placeholder_notes') }}">{{ $appointment->notes ?? '' }}</textarea>
                            <div class="invalid-feedback" id="error_notes"></div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-center mt-4">
                            <button type="submit" id="btn-submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold text-uppercase shadow-lg transition-transform hover-scale">
                                <span class="btn-text">{{ __('appointment.btn_confirm_book') }}</span>
                                <span class="btn-loading d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                    {{ __('appointment.btn_processing') }}
                                </span>
                            </button>
                        </div>
                    </div>
                </form>

                <style>
                    .slot-btn-radio { display: none; }
                    .slot-label {
                        display: block;
                        padding: 10px 8px;
                        border: 1px solid #cbd5e1;
                        border-radius: 10px;
                        text-align: center;
                        cursor: pointer;
                        transition: all 0.2s ease-in-out;
                        background-color: #ffffff;
                    }
                    .slot-label:hover:not(.disabled) {
                        border-color: #0d6efd;
                        background-color: #eff6ff;
                    }
                    .slot-btn-radio:checked + .slot-label {
                        background-color: #0d6efd;
                        color: #ffffff !important;
                        border-color: #0d6efd;
                        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25);
                    }
                    .slot-btn-radio:checked + .slot-label .slot-subtext {
                        color: rgba(255, 255, 255, 0.85) !important;
                    }
                    .slot-label.disabled {
                        background-color: #f1f5f9;
                        border-color: #e2e8f0;
                        color: #94a3b8;
                        cursor: not-allowed;
                        opacity: 0.55;
                    }
                    .flatpickr-calendar {
                        -webkit-animation: none !important;
                        animation: none !important;
                    }
                </style>

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" crossorigin="anonymous" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" crossorigin="anonymous"></script>

                <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // Khai báo các câu thông báo đa ngôn ngữ dùng trong JavaScript
                    const i18n = {
                        noSlots: @json(__('appointment.no_slots_available')),
                        errorSlots: @json(__('appointment.error_loading_slots')),
                        successBooking: @json(__('appointment.booking_success')),
                        validationError: @json(__('appointment.validation_error')),
                        generalError: @json(__('appointment.general_error')),
                        serverError: @json(__('appointment.server_error'))
                    };

                    const clinicId = "{{ $clinic->id }}";
                    const bookingForm = document.getElementById('booking-form');
                    const bookedSuccessSection = document.getElementById('booked-success-section');
                    const bookedTbody = document.getElementById('booked-appointments-tbody');
                    const btnShowForm = document.getElementById('btn-show-booking-form');
                    
                    const dateInput = document.getElementById('booking_date_picker');
                    const tzSelect = document.getElementById('user_timezone');
                    const slotsContainer = document.getElementById('slots-container');
                    const loadingSpinner = document.getElementById('slots-loading');
                    const hiddenStartTimeInput = document.getElementById('start_time');
                    const btnSubmit = document.getElementById('btn-submit');
                    const formAlert = document.getElementById('form-alert');
                    const serviceTypeInput = document.querySelector('input[name="service_type"]');
                    const getServiceType = () => serviceTypeInput ? serviceTypeInput.value : '';

                    let flatpickrInstance = null;
                    let disabledDatesMap = [];

                    if (btnShowForm) {
                        btnShowForm.addEventListener('click', function () {
                            bookingForm.classList.remove('d-none');
                            bookingForm.scrollIntoView({ behavior: 'smooth' });
                        });
                    }

                    // Auto-detect Timezone
                    const userDetectedTz = Intl.DateTimeFormat().resolvedOptions().timeZone;
                    if (userDetectedTz) {
                        let hasOption = Array.from(tzSelect.options).some(opt => opt.value === userDetectedTz);
                        if (!hasOption) {
                            let newOpt = new Option(`${userDetectedTz} (Local Detected)`, userDetectedTz, true, true);
                            tzSelect.add(newOpt, 0);
                        } else {
                            tzSelect.value = userDetectedTz;
                        }
                    }

                    // Flatpickr setup
                    flatpickrInstance = flatpickr(dateInput, {
                        dateFormat: "Y-m-d",
                        minDate: "today",
                        animate: false,
                        disable: [
                            function(date) {
                                const dateStr = flatpickr.formatDate(date, "Y-m-d");
                                return disabledDatesMap.includes(dateStr);
                            }
                        ],
                        onChange: function(selectedDates, dateStr) {
                            if (dateStr) {
                                fetchAvailableSlots(dateStr, tzSelect.value, getServiceType());
                            }
                        },
                        onMonthChange: function(selectedDates, dateStr, instance) {
                            const currentYearMonth = flatpickr.formatDate(new Date(instance.currentYear, instance.currentMonth, 1), "Y-m");
                            fetchMonthAvailability(currentYearMonth, tzSelect.value, getServiceType());
                        }
                    });

                    async function fetchMonthAvailability(monthStr, timezone, serviceType) {
                        try {
                            const response = await fetch(`/api/v1/clinics/${clinicId}/month-availability?month=${monthStr}&timezone=${encodeURIComponent(timezone)}&service_type=${encodeURIComponent(serviceType)}`);
                            const result = await response.json();

                            if (result.success) {
                                disabledDatesMap = result.data.dates_status
                                    .filter(item => item.status === 'disabled')
                                    .map(item => item.date);

                                flatpickrInstance.redraw();
                            }
                        } catch (error) {
                            console.error("Error fetching month availability:", error);
                        }
                    }

                    async function fetchAvailableSlots(dateStr, timezone, serviceType) {
                        slotsContainer.innerHTML = '';
                        loadingSpinner.classList.remove('d-none');
                        hiddenStartTimeInput.value = '';

                        try {
                            const response = await fetch(
                                `/api/v1/clinics/${clinicId}/available-slots?date=${dateStr}&timezone=${encodeURIComponent(timezone)}&service_type=${encodeURIComponent(serviceType)}`
                            );
                            const result = await response.json();

                            loadingSpinner.classList.add('d-none');

                            if (result.success && result.data.slots && result.data.slots.length > 0) {
                                renderSlotsUI(result.data.slots);
                            } else {
                                slotsContainer.innerHTML = `<div class="col-12 text-center text-muted py-3">${i18n.noSlots}</div>`;
                            }
                        } catch (error) {
                            console.error("Error fetching available slots:", error);
                            loadingSpinner.classList.add('d-none');
                            slotsContainer.innerHTML = `<div class="col-12 text-center text-danger py-3">${i18n.errorSlots}</div>`;
                        }
                    }

                    function renderSlotsUI(slots) {
                        slotsContainer.innerHTML = '';

                        slots.forEach((slot, index) => {
                            const isDisabled = !slot.is_available;
                            const slotId = `slot_option_${index}`;
                            const displayVnTime = slot.clinic_time_display || slot.clinic_time_start?.substring(0, 5) || '';

                            const col = document.createElement('div');
                            col.className = 'col-6 col-sm-4 col-md-3';

                            col.innerHTML = `
                                <input type="radio" name="selected_slot_radio" id="${slotId}" 
                                    value="${slot.clinic_time_start}" 
                                    class="slot-btn-radio" ${isDisabled ? 'disabled' : ''}>
                                <label for="${slotId}" class="slot-label ${isDisabled ? 'disabled' : ''}">
                                    <div class="fw-bold fs-6">${slot.client_display_time}</div>
                                    <div class="small text-muted fs-7 slot-subtext mt-1">
                                        🇻🇳 ${displayVnTime} (VN)
                                    </div>
                                </label>
                            `;

                            slotsContainer.appendChild(col);
                        });

                        document.querySelectorAll('input[name="selected_slot_radio"]').forEach(radio => {
                            radio.addEventListener('change', function () {
                                hiddenStartTimeInput.value = this.value;
                                clearFieldError('start_time');
                            });
                        });
                    }

                    tzSelect.addEventListener('change', function () {
                        const selectedTz = this.value;
                        const now = new Date();
                        const currentMonthStr = flatpickr.formatDate(now, "Y-m");

                        fetchMonthAvailability(currentMonthStr, selectedTz, getServiceType());

                        if (dateInput.value) {
                            fetchAvailableSlots(dateInput.value, selectedTz, getServiceType());
                        }
                    });

                    // AJAX Submit Form Đặt Lịch
                    bookingForm.addEventListener('submit', async function (e) {
                        e.preventDefault();

                        clearAllErrors();
                        setSubmitLoading(true);

                        const formData = new FormData(bookingForm);
                        const csrfToken = formData.get('_token');

                        const data = {
                            clinic_id: formData.get('clinic_id'),
                            service_type: formData.get('service_type'),
                            patient_name: formData.get('patient_name'),
                            patient_email: formData.get('patient_email'),
                            patient_phone: formData.get('patient_phone'),
                            notes: formData.get('notes'),
                            appointment_date: formData.get('appointment_date'),
                            start_time: formData.get('start_time'),
                            patient_timezone: formData.get('patient_timezone')
                        };

                        try {
                            const response = await fetch("/api/booking", {
                                method: "POST",
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify(data)
                            });

                            const result = await response.json();

                            if (response.ok && result.success) {
                                showFormAlert('success', result.message || i18n.successBooking);

                                bookingForm.classList.add('d-none');

                                if (bookedTbody) {
                                    const appt = result.data || {};
                                    const newRow = `
                                        <tr class="table-success">
                                            <td class="fw-semibold">${appt.patient_name || formData.get('patient_name')}</td>
                                            <td>${appt.patient_email || formData.get('patient_email')}</td>
                                            <td><small class="badge bg-light text-dark border">${formData.get('patient_timezone')}</small></td>
                                            <td>
                                                <strong class="text-primary">
                                                    ${formData.get('appointment_date')} (${formData.get('start_time')})
                                                </strong>
                                            </td>
                                        </tr>
                                    `;
                                    bookedTbody.insertAdjacentHTML('afterbegin', newRow);
                                }

                                if (bookedSuccessSection) {
                                    bookedSuccessSection.classList.remove('d-none');
                                    bookedSuccessSection.scrollIntoView({ behavior: 'smooth' });
                                }

                            } else if (response.status === 422) {
                                showFormAlert('danger', i18n.validationError);
                                displayValidationErrors(result.errors);
                            } else {
                                showFormAlert('danger', result.message || i18n.generalError);
                            }
                        } catch (error) {
                            console.error("Submit Error:", error);
                            showFormAlert('danger', i18n.serverError);
                        } finally {
                            setSubmitLoading(false);
                        }
                    });

                    function setSubmitLoading(isLoading) {
                        btnSubmit.disabled = isLoading;
                        const btnText = btnSubmit.querySelector('.btn-text');
                        const btnLoading = btnSubmit.querySelector('.btn-loading');

                        if (isLoading) {
                            btnText.classList.add('d-none');
                            btnLoading.classList.remove('d-none');
                        } else {
                            btnText.classList.remove('d-none');
                            btnLoading.classList.add('d-none');
                        }
                    }

                    function showFormAlert(type, message) {
                        if (!formAlert) return;
                        formAlert.className = `alert alert-${type} mb-3`;
                        formAlert.innerText = message;
                        formAlert.classList.remove('d-none');
                        formAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }

                    function clearAllErrors() {
                        if (formAlert) formAlert.classList.add('d-none');
                        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                        document.querySelectorAll('.invalid-feedback').forEach(el => el.innerText = '');
                    }

                    function clearFieldError(fieldName) {
                        const inputEl = document.querySelector(`[name="${fieldName}"]`);
                        if (inputEl) inputEl.classList.remove('is-invalid');
                        const errEl = document.getElementById(`error_${fieldName}`);
                        if (errEl) errEl.innerText = '';
                    }

                    function displayValidationErrors(errors) {
                        for (const [field, messages] of Object.entries(errors)) {
                            const inputEl = document.querySelector(`[name="${field}"]`);
                            if (inputEl) {
                                inputEl.classList.add('is-invalid');
                            }
                            const errEl = document.getElementById(`error_${field}`);
                            if (errEl) {
                                errEl.innerText = messages[0];
                            }
                        }
                    }

                    const initialMonth = flatpickr.formatDate(new Date(), "Y-m");
                    fetchMonthAvailability(initialMonth, tzSelect.value, getServiceType());
                });
                </script>
        </section>
    </div>
@endsection