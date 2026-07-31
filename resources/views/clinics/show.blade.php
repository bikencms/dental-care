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
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle border">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>{{ __('clinics.table_category') }}</th>
                                                    <th>{{ __('clinics.table_treatment') }}</th>
                                                    <th>{{ __('clinics.table_price') }}</th>
                                                    <th>{{ __('clinics.table_warranty') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($clinic->services as $service)
                                                    <tr>
                                                        <td class="fw-bold text-capitalize">{{ $service->category }}</td>
                                                        <td>{{ $service->name }}</td>
                                                        <td class="text-danger fw-bold">${{ number_format($service->starting_price) }} {{ $service->unit_name ? '/ '.$service->unit_name : '' }}</td>
                                                        <td>{{ $service->warranty_years ? $service->warranty_years.' '.__('clinics.warranty_years') : __('clinics.warranty_na') }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">{{ __('clinics.no_pricing_available') }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
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
        <section id="booking-section" class="py-5 mt-5 bg-white rounded-4 p-4 p-md-5 shadow-sm border">
            <div class="text-center mb-4">
                <h2 class="fw-bold">{{ __('clinics.booking_title') }}</h2>
                <p class="text-muted">{{ __('clinics.booking_subtitle', ['clinic_name' => $clinic->name]) }}</p>
            </div>

            <form action="#" method="POST">
                @csrf
                
                <input type="hidden" name="token" value="{{ $appointment->token ?? '' }}">
                <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">{{ __('clinics.label_fullname') }}</label>
                        <input type="text" name="name" class="form-control form-control-lg fs-6" value="{{ $customer->name ?? '' }}" required placeholder="{{ __('clinics.placeholder_fullname') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">{{ __('clinics.label_email') }}</label>
                        <input type="email" name="email" class="form-control form-control-lg fs-6" value="{{ $customer->email ?? '' }}" required placeholder="{{ __('clinics.placeholder_email') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">{{ __('clinics.label_date') }}</label>
                        <input type="date" name="booking_date" class="form-control form-control-lg fs-6" min="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">{{ __('clinics.label_time') }}</label>
                        <select name="booking_time" class="form-select form-select-lg fs-6" required>
                            <option value="">{{ __('clinics.option_choose_time') }}</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                        </select>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold text-uppercase shadow-lg transition-transform hover-scale">
                            {{ __('clinics.btn_confirm_book') }}
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection