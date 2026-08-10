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

    <!-- HEADER NAVIGATION -->
    <header class="bg-slate-900 text-white py-4 shadow-md">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">{{ __('home.title') }}</h1>
            <a href="{{ localized_route('home') }}" class="text-sm text-sky-400 hover:underline"><i class="fa-solid fa-house"></i> {{ __('clinics.header_home') }}</a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        
        <!-- PAGE TITLE -->
        <div class="mb-8 text-center">
            <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900">{{ __('clinics.heading') }}</h2>
            <p class="text-sm text-slate-500 mt-2">{{ __('clinics.subheading') }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- SIDEBAR FILTER -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 sticky top-6">
                    <h3 class="text-sm font-bold text-slate-800 mb-3 flex items-center gap-2">
                        <i class="fa-solid fa-filter text-sky-600 text-xs"></i> 
                        <span>{{ __('clinics.filter_title') }}</span>
                    </h3>
                    <form action="{{ localized_route('clinics.index', [ 'token' => $appointment->token ] ) }}" method="GET" class="space-y-4">
                        <!-- Giữ lại thông tin dịch vụ đã chọn từ bước trước -->
                        @if(request('services'))
                            @foreach((array)request('services') as $sId)
                                <input type="hidden" name="services[]" value="{{ $sId }}">
                            @endforeach
                        @endif

                        <!-- 1. Vị trí địa lý -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">{{ __('clinics.location_label') }}</label>
                            <select name="district_id" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none bg-slate-50 focus:bg-white">
                                <option value="">{{ __('clinics.all_locations') }}</option>
                                <option value="1" {{ request('district_id') == 1 ? 'selected' : '' }}>{{ __('clinics.location_q1') }}</option>
                                <option value="5" {{ request('district_id') == 5 ? 'selected' : '' }}>{{ __('clinics.location_q5') }}</option>
                                <option value="7" {{ request('district_id') == 7 ? 'selected' : '' }}>{{ __('clinics.location_q7') }}</option>
                            </select>
                        </div>

                        <!-- 2. Trình độ & Chuyên môn Bác sĩ -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">{{ __('clinics.specialty_label') }}</label>
                            <select name="doctor_specialty" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none bg-slate-50 focus:bg-white">
                                <option value="">{{ __('clinics.all_specialties') }}</option>
                                
                                <option value="has_studied_abroad" {{ request('doctor_specialty') == 'foreign_trained' ? 'selected' : '' }}>
                                    {{ __('clinics.spec_foreign_trained') }}
                                </option>
                                
                                <option value="has_studied_abroad" {{ request('doctor_specialty') == 'expert_10_years' ? 'selected' : '' }}>
                                    {{ __('clinics.spec_expert_10_years') }}
                                </option>
                                
                                <option value="has_studied_abroad" {{ request('doctor_specialty') == 'prof_phd' ? 'selected' : '' }}>
                                    {{ __('clinics.spec_prof_phd') }}
                                </option>

                                <option value="has_studied_abroad" {{ request('doctor_specialty') == 'association_leaders' ? 'selected' : '' }}>
                                    {{ __('clinics.spec_association_leaders') }}
                                </option>

                                <option value="has_studied_abroad" {{ request('doctor_specialty') == 'foreign_expat_dentists' ? 'selected' : '' }}>
                                    {{ __('clinics.spec_foreign_expat_dentists') }}
                                </option>

                                <option value="has_studied_abroad" {{ request('doctor_specialty') == 'international_members' ? 'selected' : '' }}>
                                    {{ __('clinics.spec_international_members') }}
                                </option>

                                <option value="has_studied_abroad" {{ request('doctor_specialty') == 'trainers_speakers' ? 'selected' : '' }}>
                                    {{ __('clinics.spec_trainers_speakers') }}
                                </option>
                            </select>
                        </div>

                        <!-- 3. Bộ lọc nâng cao (HTML details) -->
                        <details class="group">
                            <summary class="w-full border border-slate-300 hover:border-sky-500 text-slate-700 font-medium py-2 px-3 rounded-lg text-sm flex items-center justify-between transition bg-slate-50 hover:bg-sky-50 cursor-pointer list-none select-none">
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-sliders-h text-sky-600"></i>
                                    <span>{{ __('clinics.advance_filter_btn') }}</span>
                                </span>
                                <i class="fas fa-chevron-down group-open:rotate-180 transition-transform duration-200"></i>
                            </summary>

                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 space-y-4 mt-2">
                                
                                <!-- Additional Languages -->
                                <div>
                                    <label class="block text-xs font-bold uppercase text-slate-500 mb-2">
                                        {{ __('clinics.additional_languages') }}
                                    </label>
                                    <div class="grid grid-cols-2 gap-2">
                                        @foreach(['Chinese' => 'Chinese', 'FR' => 'FR', 'JP' => 'JP', 'KR' => 'KR'] as $code => $label)
                                            <label class="flex items-center gap-2 p-2 rounded border border-slate-200 bg-white hover:border-sky-500 cursor-pointer text-xs font-medium text-slate-700 transition">
                                                <input type="checkbox" name="additional_languages[]" value="{{ $code }}" 
                                                    {{ in_array($code, (array)request('additional_languages')) ? 'checked' : '' }} 
                                                    class="rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                                <span>{{ $label }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <hr class="border-slate-200">

                                <!-- Dịch vụ hỗ trợ & Tiện ích -->
                                <div>
                                    <label class="block text-xs font-bold uppercase text-slate-500 mb-2">
                                        {{ __('clinics.transport_partners') }}
                                    </label>
                                    <div class="space-y-2">
                                        <!-- Airport Pickup -->
                                        <label class="flex items-start gap-2.5 p-2.5 rounded-lg border border-slate-200 bg-white hover:border-sky-500 cursor-pointer transition">
                                            <input type="checkbox" name="facilities[]" value="free_airport_pickup" 
                                                {{ in_array('free_airport_pickup', (array)request('facilities')) ? 'checked' : '' }}
                                                class="mt-0.5 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                            <div class="text-xs">
                                                <span class="font-semibold text-slate-800 block">{{ __('clinics.facility_airport_pickup') }}</span>
                                                <span class="text-slate-500 flex items-center gap-1 mt-0.5">
                                                    <i class="fas fa-info-circle text-sky-500"></i> {{ __('clinics.facility_airport_pickup_note') }}
                                                </span>
                                            </div>
                                        </label>

                                        <!-- Local Transport -->
                                        <label class="flex items-start gap-2.5 p-2.5 rounded-lg border border-slate-200 bg-white hover:border-sky-500 cursor-pointer transition">
                                            <input type="checkbox" name="facilities[]" value="local_transport" 
                                                {{ in_array('local_transport', (array)request('facilities')) ? 'checked' : '' }}
                                                class="mt-0.5 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                            <div class="text-xs">
                                                <span class="font-semibold text-slate-800 block">{{ __('clinics.facility_local_transport') }}</span>
                                                <span class="text-slate-500 flex items-center gap-1 mt-0.5">
                                                    <i class="fas fa-info-circle text-sky-500"></i> {{ __('clinics.facility_local_transport_note') }}
                                                </span>
                                            </div>
                                        </label>

                                        <!-- Partner Clinic -->
                                        <label class="flex items-start gap-2.5 p-2.5 rounded-lg border border-slate-200 bg-white hover:border-sky-500 cursor-pointer transition">
                                            <input type="checkbox" name="facilities[]" value="partner_clinic_overseas" 
                                                {{ in_array('partner_clinic_overseas', (array)request('facilities')) ? 'checked' : '' }}
                                                class="mt-0.5 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                            <div class="text-xs font-semibold text-slate-800">
                                                {{ __('clinics.facility_partner_clinic') }}
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <hr class="border-slate-200">

                                <!-- Trang thiết bị & Tiêu chuẩn lâm sàng -->
                                <div>
                                    <label class="block text-xs font-bold uppercase text-slate-500 mb-2">
                                        {{ __('clinics.clinical_standards') }}
                                    </label>
                                    <div class="space-y-2">
                                        <label class="flex items-center gap-2.5 p-2 rounded-lg border border-slate-200 bg-white hover:border-sky-500 cursor-pointer text-xs font-medium text-slate-800 transition">
                                            <input type="checkbox" name="facilities[]" value="diag_3d_imaging" 
                                                {{ in_array('diag_3d_imaging', (array)request('facilities')) ? 'checked' : '' }}
                                                class="rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                            <span>{{ __('clinics.facility_3d_imaging') }}</span>
                                        </label>

                                        <label class="flex items-center gap-2.5 p-2 rounded-lg border border-slate-200 bg-white hover:border-sky-500 cursor-pointer text-xs font-medium text-slate-800 transition">
                                            <input type="checkbox" name="facilities[]" value="fast_inhouse_lab" 
                                                {{ in_array('fast_inhouse_lab', (array)request('facilities')) ? 'checked' : '' }}
                                                class="rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                            <span>{{ __('clinics.facility_inhouse_lab') }}</span>
                                        </label>

                                        <label class="flex items-center gap-2.5 p-2 rounded-lg border border-slate-200 bg-white hover:border-sky-500 cursor-pointer text-xs font-medium text-slate-800 transition">
                                            <input type="checkbox" name="facilities[]" value="sterile_operating_room" 
                                                {{ in_array('sterile_operating_room', (array)request('facilities')) ? 'checked' : '' }}
                                                class="rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                            <span>{{ __('clinics.facility_operating_room') }}</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </details>

                        <!-- 4. Submit Button -->
                        <button type="submit" class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2.5 rounded-lg text-sm transition-colors shadow-sm flex items-center justify-center gap-2">
                            <i class="fas fa-search"></i>
                            <span>{{ __('clinics.apply_filter') }}</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- CLINIC LIST BLOCKS -->
            <div class="lg:col-span-3 space-y-6">
                @forelse($clinics as $clinic)
                    <!-- Single Clinic Block -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col md:flex-row hover:shadow-md transition-shadow">
                        <!-- Hình ảnh phòng khám -->
                        <div class="md:w-1/3 relative bg-slate-100 min-h-[220px]">
                            <img src="{{ $clinic->image_url ?? 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&q=80&w=600' }}" 
                                 alt="{{ $clinic->name }}" 
                                 class="w-full h-full object-cover">
                        </div>

                        <!-- Thông tin chi tiết phòng khám -->
                        <div class="md:w-2/3 p-6 flex flex-col justify-between">
                            <div>
                                <!-- Tên phòng khám -->
                                <h3 class="text-xl font-bold text-slate-900 mb-2">
                                    {{ $clinic->name }}
                                </h3>

                                <!-- Địa chỉ / Vị trí -->
                                <p class="text-sm text-slate-600 mb-3 flex items-center gap-2">
                                    <i class="fa-solid fa-location-dot text-rose-500"></i> 
                                    <span>{{ $clinic->address }}, {{ $clinic->district ?? 'Quận 1' }}, TP.HCM</span>
                                </p>

                                <!-- Ngôn ngữ giao tiếp -->
                                <p class="text-sm text-slate-600 mb-3 flex items-center gap-2">
                                    <i class="fa-solid fa-language text-sky-600"></i>
                                    <span>{{ $clinic->support_type == 'free_english' ? __('clinics.lang_free') : __('clinics.lang_paid') }}</span>
                                </p>

                                <!-- Giá khởi điểm đúng dịch vụ khách chọn -->
                                <div class="bg-sky-50 text-sky-900 px-3 py-2 rounded-lg text-sm font-semibold inline-block mb-4">
                                    <i class="fa-solid fa-tag text-sky-600 mr-1"></i> 
                                    {{ __('clinics.starting_price', ['price' => '$' . ($clinic->pivot_starting_price ?? '600')]) }}
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-wrap items-center gap-3 pt-4 border-t border-slate-100">
                                <!-- Nút View Detailed Information -->
                                <a href="{{ localized_route('clinics.show', ['token' => $appointment->token, 'id' =>  $clinic->id]) }}" 
                                   class="px-4 py-2 border border-slate-300 hover:border-slate-400 text-slate-700 text-sm font-semibold rounded-lg transition-colors">
                                   {{ __('clinics.btn_details') }}
                                </a>

                                <!-- Nút Book Online Consultation -->
                                <a href="{{ localized_route('clinics.show', ['token' => $appointment->token, 'id' =>  $clinic->id]) }}#booking-section" 
                                   class="px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors">
                                   {{ __('clinics.btn_book') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-12 text-center rounded-2xl border border-slate-200">
                        <i class="fa-solid fa-face-smile text-slate-300 text-4xl mb-3"></i>
                        <p class="text-slate-500 font-medium">{{ __('clinics.no_result') }}</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $clinics->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </main>

</body>
</html>