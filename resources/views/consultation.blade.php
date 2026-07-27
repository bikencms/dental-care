<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('consultation.title') }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="@yield('description', 'Vietnam Dental Care provides world-class dental services in Vietnam, including dental implants, orthodontics, veneers, crowns, teeth whitening, and general dentistry. Experience personalized care, advanced technology, and affordable treatment for local and international patients.')">
    <meta name="keywords" content="Vietnam Dental Care, dental clinic Vietnam, dental implants Vietnam, cosmetic dentistry, orthodontics, braces, porcelain veneers, dental crowns, teeth whitening, smile makeover, oral surgery, affordable dental care, international dental clinic, Ho Chi Minh dental clinic">
    <meta name="author" content="Minh Biken">
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://vietnamdentalcare.vn/assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="https://vietnamdentalcare.vn/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://vietnamdentalcare.vn/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://vietnamdentalcare.vn/assets/images/favicon-16x16.png">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vietnam Dental Care">
    <meta property="og:title" content="Vietnam Dental Care | Dental Implant Assessment Form">
    <meta property="og:description" content="Prepare for Your Video Consultation with Our Specialists.">
    <meta property="og:url" content="https://vietnamdentalcare.vn/consultation">
    <meta property="og:image" content="https://vietnamdentalcare.vn/assets/images/og-image.png">
    <meta property="og:locale" content="en_US">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Vietnam Dental Care | Dental Implants & Cosmetic Dentistry">
    <meta name="twitter:description" content="Advanced dental treatments in Vietnam for local and international patients.">
    <meta name="twitter:image" content="https://vietnamdentalcare.vn/assets/images/og-image.jpg">

    @if(app()->getLocale() == 'vi')
        <link rel="canonical" href="https://vietnamdentalcare.vn/vi/consultation">
    @else
        <link rel="canonical" href="https://vietnamdentalcare.vn/consultation">
    @endif

    <link rel="alternate" hreflang="en" href="https://vietnamdentalcare.vn/consultation">
    <link rel="alternate" hreflang="vi" href="https://vietnamdentalcare.vn/vi/consultation">
    <link rel="alternate" hreflang="x-default" href="https://vietnamdentalcare.vn/consultation">

    <meta name="robots" content="index, follow, max-image-preview:large">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-teal-700 {
            color: #133eb3 !important;
        }

        .focus\:ring-teal-500:focus {
            --tw-ring-color: #133eb3 !important;
        }
        .text-slate-500 {
            color: #133eb3 !important;
        }

        .hover\:bg-teal-700:hover {
            background-color: #133eb3 !important;
        }

        .bg-teal-600 {
            background-color: #133eb3 !important;
        }

        .text-teal-600 {
            color: #133eb3 !important;
        }

        .hover\:bg-teal-50\/50:hover {
            background-color: #e8eeff !important;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased py-10 px-4">
    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
        
        {{-- Header Form --}}
        <div class="bg-teal-600 px-8 py-8 text-white" style="background:linear-gradient(135deg,#274289,#1d233b);">
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight mb-2">
                @if( $appointment->interest === ["dental_implants"] )
                    {{ __('consultation.title') }}
                @elseif( $appointment->interest === ["porcelain_veneers"] )
                    {{ __('consultation.title_ven') }}
                @else
                Coming Soon...
                @endif
            </h1>
            <p class="text-teal-100 text-base">
                {{ __('consultation.title_head') }}, <span class="font-semibold text-white">{{ $appointment->fullname }}</span>! {{ __('consultation.title_head2') }}
            </p>
        </div>
        {{-- Hiển thị thông báo thành công từ Session --}}
        @if (session('success'))
            <div class="p-6 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-lg text-center font-medium shadow-sm">
                <svg class="w-12 h-12 mx-auto text-emerald-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-base font-semibold">{{ session('success') }}</p>
            </div>
        @else

            {{-- KHỐI THÔNG BÁO: Hiển thị khi đã có dữ liệu $consultation --}}
            @if (!empty($consultation))
                <div id="alreadySubmittedBox" class="p-8 my-6 bg-white border border-slate-200 rounded-2xl shadow-sm text-center max-w-2xl mx-auto space-y-6">
                    <div class="w-16 h-16 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-2xl font-bold text-slate-800">
                            {{ __('You have already submitted this assessment form') }}
                        </h3>
                        <p class="text-slate-600 text-sm">
                            {{ __('Your responses are saved. If you wish to make changes, click the button below.') }}
                        </p>
                    </div>

                    {{-- Cảnh báo --}}
                    <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl text-amber-800 text-sm flex items-center gap-3 text-left">
                        <svg class="w-6 h-6 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <span>
                            <strong>{{ __('Warning') }}:</strong> {{ __('Updating this form will overwrite your previous answers and uploaded files.') }}
                        </span>
                    </div>

                    {{-- Nút sửa thật to --}}
                    <button type="button" id="enableEditBtn" 
                        class="w-full sm:w-auto px-10 py-4 bg-teal-600 hover:bg-teal-700 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-teal-600/30 transition transform hover:-translate-y-0.5 active:translate-y-0">
                        ✏️ {{ __('Edit Consultation Form') }}
                    </button>
                </div>
            @endif

            {{-- FORM ĐÁNH GIÁ: Nếu có $consultation thì mặc định ẩn (`hidden`), bấm nút mới hiện --}}
            <form id="consultationForm" action="{{ route('consultation.store', $appointment->id) }}" method="POST" enctype="multipart/form-data" 
                class="p-8 space-y-8 {{ !empty($consultation) ? 'hidden' : '' }}">
                @csrf
                
                <div id="alertMessage" class="hidden p-4 rounded-lg text-sm font-medium"></div>
                
                <div class="bg-slate-50 p-4 sm:p-5 rounded-xl border border-slate-200/80 grid grid-cols-1 sm:grid-cols-2 gap-4">

                    {{-- Name Input --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500">
                                {{ __('consultation.name') }}
                            </label>
                            <span class="text-[10px] font-semibold bg-slate-200 text-slate-600 px-2 py-0.5 rounded-full">{{ __('consultation.auto_filled') }}</span>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" name="name" value="{{ old('name', $appointment->fullname) }}" readonly
                                class="w-full bg-slate-100/80 border border-slate-200 rounded-lg pl-9 pr-3 py-2 text-sm text-slate-700 font-semibold cursor-not-allowed focus:outline-none">
                        </div>
                    </div>

                    {{-- Email Input --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500">
                                {{ __('consultation.email') }}
                            </label>
                            <span class="text-[10px] font-semibold bg-slate-200 text-slate-600 px-2 py-0.5 rounded-full">{{ __('consultation.auto_filled') }}</span>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email', $appointment->email ?? '') }}" readonly
                                class="w-full bg-slate-100/80 border border-slate-200 rounded-lg pl-9 pr-3 py-2 text-sm text-slate-700 font-semibold cursor-not-allowed focus:outline-none">
                        </div>
                    </div>

                </div>

                <hr class="border-slate-200">

                {{-- PART 1: Dùng chung cho tất cả dịch vụ --}}
                <section class="space-y-4">
                    <h2 class="text-xl font-bold text-teal-700 flex items-center gap-2">
                        {{ __('consultation.part1') }}
                    </h2>
                    
                    <p class="text-sm text-slate-600 leading-relaxed">
                        {{ __('consultation.part1_question') }}
                        <span class="block italic text-slate-500 mt-1">{{ __('consultation.part1_note') }}</span>
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">{{ __('consultation.expected') }} <span class="text-red-500">*</span></label>
                            <input type="date" name="arrival_date" 
                                value="{{ old('arrival_date', isset($consultation->arrival_date) ? \Carbon\Carbon::parse($consultation->arrival_date)->format('Y-m-d') : '') }}" required
                                class="w-full border border-slate-300 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition">
                            @error('arrival_date')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1">{{ __('consultation.length') }} <span class="text-red-500">*</span></label>
                            <input type="text" name="length_of_stay" value="{{ old('length_of_stay', $consultation->length_of_stay ?? '') }}" placeholder="{{ __('consultation.length_holder') }}" required
                                class="w-full border border-slate-300 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition">
                            @error('length_of_stay')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </section>

                <hr class="border-slate-200">

                @php
                    $interests = (array) $appointment->interest;
                    $savedSmileGoals = is_array($consultation->smile_goals ?? null) ? $consultation->smile_goals : json_decode($consultation->smile_goals ?? '[]', true) ?? [];
                    $savedConditions = is_array($consultation->dental_conditions ?? null) ? $consultation->dental_conditions : json_decode($consultation->dental_conditions ?? '[]', true) ?? [];
                    $savedSmilePhotos = is_array($consultation->smile_photos ?? null) ? $consultation->smile_photos : json_decode($consultation->smile_photos ?? '[]', true) ?? [];
                @endphp

                @if( in_array('dental_implants', $interests) )
                    {{-- PART 2: Dental Implants --}}
                    <section class="space-y-6">
                        <h2 class="text-xl font-bold text-teal-700 flex items-center gap-2">
                            {{ __('consultation.part2') }}
                        </h2>

                        {{-- Câu 2 --}}
                        <div class="space-y-3">
                            <label class="block text-sm font-semibold text-slate-800">
                                {{ __('consultation.part2_question') }} <span class="text-red-500">*</span>
                            </label>
                            <div class="space-y-2 pl-1">
                                @php $duration = old('missing_teeth_duration', $consultation->missing_teeth_duration ?? ''); @endphp
                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="radio" name="missing_teeth_duration" value="Less than 6 months" {{ $duration === 'Less than 6 months' ? 'checked' : '' }} required class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part2_answer1') }}</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="radio" name="missing_teeth_duration" value="6 months – 2 years" {{ $duration === '6 months – 2 years' ? 'checked' : '' }} class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part2_answer2') }}</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="radio" name="missing_teeth_duration" value="More than 2 years" {{ $duration === 'More than 2 years' ? 'checked' : '' }} class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part2_answer3') }}</span>
                                </label>
                                @error('missing_teeth_duration')
                                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Câu 3 --}}
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-semibold text-slate-800">
                                    {{ __('consultation.part3_question') }} <span class="text-red-500">*</span>
                                </label>
                                <p class="text-xs text-slate-500 italic mt-0.5">
                                    {{ __('consultation.part3_note') }}
                                </p>
                            </div>
                            
                            <div class="space-y-2 pl-1">
                                @php $health = old('health_condition', $consultation->health_condition ?? ''); @endphp
                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="radio" name="health_condition" value="Neither" {{ $health === 'Neither' ? 'checked' : '' }} required onclick="toggleSmokingInput(false)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part3_answer1') }}</span>
                                </label>
                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="radio" name="health_condition" value="Diabetes" {{ $health === 'Diabetes' ? 'checked' : '' }} onclick="toggleSmokingInput(false)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part3_answer2') }}</span>
                                </label>
                                
                                {{-- Smoke option --}}
                                <div class="border border-slate-200 rounded-lg p-3 hover:bg-teal-50/50 transition">
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="radio" name="health_condition" value="Smoke" {{ $health === 'Smoke' ? 'checked' : '' }} onclick="toggleSmokingInput(true)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                        <span class="text-sm text-slate-700">{{ __('consultation.part3_answer3') }}</span>
                                    </label>
                                    <div id="smoking_amount_wrapper" class="{{ in_array($health, ['Smoke', 'Both']) ? '' : 'hidden' }} mt-3 pl-7">
                                        <input type="text" name="smoking_amount" value="{{ old('smoking_amount', $consultation->smoking_amount ?? '') }}" placeholder="{{ __('consultation.part3_answer3_holder') }}"
                                            class="w-full text-sm border border-slate-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
                                    </div>
                                </div>

                                {{-- Both option --}}
                                <div class="border border-slate-200 rounded-lg p-3 hover:bg-teal-50/50 transition">
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="radio" name="health_condition" value="Both" {{ $health === 'Both' ? 'checked' : '' }} onclick="toggleSmokingInput(true)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                        <span class="text-sm text-slate-700">{{ __('consultation.part3_answer4') }}</span>
                                    </label>
                                </div>
                                @error('health_condition')
                                    <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Câu 4 --}}
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-semibold text-slate-800">
                                    {{ __('consultation.part4_question') }} <span class="text-red-500">*</span>
                                </label>
                                <p class="text-xs text-slate-500 italic mt-0.5">
                                    {{ __('consultation.part4_note') }}
                                </p>
                            </div>

                            @php 
                                $xrayOpt = old('xray_option', $consultation->xray_option ?? ($consultation->xray_file ?? null ? 'upload' : '')); 
                            @endphp

                            <div class="space-y-3 pl-1">
                                {{-- Upload File Option --}}
                                <div class="border border-slate-200 rounded-lg p-4 space-y-3">
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="radio" name="xray_option" value="upload" {{ $xrayOpt === 'upload' ? 'checked' : '' }} required onclick="toggleXrayInput(true)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                        <span class="text-sm font-medium text-slate-700">{{ __('consultation.part4_answer1') }}</span>
                                    </label>
                                    
                                    <div id="xray_file_wrapper" class="{{ $xrayOpt === 'upload' ? '' : 'hidden' }} pl-7">
                                        @if(!empty($consultation->xray_file))
                                            <p class="text-xs text-teal-700 font-semibold mb-2">
                                                File hiện tại: <a href="{{ asset('storage/' . $consultation->xray_file) }}" target="_blank" class="underline hover:text-teal-900">Xem file đã tải lên</a>
                                            </p>
                                        @endif
                                        <input type="file" name="xray_file" id="xray_file" accept="image/*,.pdf,.zip,.dcm" {{ empty($consultation->xray_file) && $xrayOpt === 'upload' ? 'required' : '' }}
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 cursor-pointer">
                                        @error('xray_file')
                                            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- No File Option --}}
                                <div class="border border-slate-200 rounded-lg p-4">
                                    <label class="flex items-start gap-3 cursor-pointer">
                                        <input type="radio" name="xray_option" value="no_xray" {{ $xrayOpt === 'no_xray' ? 'checked' : '' }} onclick="toggleXrayInput(false)" class="w-4 h-4 text-teal-600 focus:ring-teal-500 mt-0.5">
                                        <span class="text-sm text-slate-700 leading-normal">
                                            {{ __('consultation.part4_answer2') }}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </section>

                @elseif( in_array('porcelain_veneers', $interests) )
                    {{-- PART 2: Smile Goals & Schedule --}}
                    <section class="space-y-4">
                        <h2 class="text-xl font-bold text-teal-700 flex items-center gap-2">
                            {{ __('consultation.part2_ven.goals_title') }}
                        </h2>

                        <div class="space-y-3">
                            <label class="block text-sm font-semibold text-slate-800">
                                {{ __('consultation.part2_ven.q2_goals_title') }} 
                                <span class="text-xs font-normal text-slate-500">{{ __('consultation.part2_ven.select_multiple') }}</span>
                            </label>

                            <div class="space-y-2 pl-1">
                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="checkbox" name="smile_goals[]" value="Whiter and brighter teeth" {{ in_array('Whiter and brighter teeth', old('smile_goals', $savedSmileGoals)) ? 'checked' : '' }} class="w-4 h-4 text-teal-600 rounded focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part2_ven.goal_color') }}</span>
                                </label>

                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="checkbox" name="smile_goals[]" value="Change the shape or size of my teeth" {{ in_array('Change the shape or size of my teeth', old('smile_goals', $savedSmileGoals)) ? 'checked' : '' }} class="w-4 h-4 text-teal-600 rounded focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part2_ven.goal_shape') }}</span>
                                </label>

                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="checkbox" name="smile_goals[]" value="Close gaps or fix minor misalignments" {{ in_array('Close gaps or fix minor misalignments', old('smile_goals', $savedSmileGoals)) ? 'checked' : '' }} class="w-4 h-4 text-teal-600 rounded focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part2_ven.goal_alignment') }}</span>
                                </label>
                            </div>
                        </div>
                    </section>

                    <hr class="border-slate-200">

                    {{-- PART 3: Dental Health & Photos --}}
                    <section class="space-y-6">
                        <h2 class="text-xl font-bold text-teal-700 flex items-center gap-2">
                            {{ __('consultation.part3_ven.health_title') }}
                        </h2>

                        {{-- Câu 3 --}}
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-semibold text-slate-800">
                                    {{ __('consultation.part3_ven.q3_conditions_title') }}
                                </label>
                                <p class="text-xs text-slate-500 italic mt-0.5">
                                    {{ __('consultation.part3_ven.q3_conditions_note') }}
                                </p>
                            </div>

                            <div class="space-y-2 pl-1">
                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="checkbox" name="dental_conditions[]" value="Teeth grinding or clenching" {{ in_array('Teeth grinding or clenching', old('dental_conditions', $savedConditions)) ? 'checked' : '' }} class="condition-checkbox w-4 h-4 text-teal-600 rounded focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part3_ven.bruxism') }}</span>
                                </label>

                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="checkbox" name="dental_conditions[]" value="Bleeding or swollen gums" {{ in_array('Bleeding or swollen gums', old('dental_conditions', $savedConditions)) ? 'checked' : '' }} class="condition-checkbox w-4 h-4 text-teal-600 rounded focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part3_ven.bleeding_gums') }}</span>
                                </label>

                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="checkbox" name="dental_conditions[]" value="Already have veneers or crowns" {{ in_array('Already have veneers or crowns', old('dental_conditions', $savedConditions)) ? 'checked' : '' }} class="condition-checkbox w-4 h-4 text-teal-600 rounded focus:ring-teal-500">
                                    <span class="text-sm text-slate-700">{{ __('consultation.part3_ven.has_crowns') }}</span>
                                </label>

                                <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                                    <input type="checkbox" name="dental_conditions[]" value="None of the above" id="none_condition" {{ in_array('None of the above', old('dental_conditions', $savedConditions)) ? 'checked' : '' }} onchange="toggleNoneCondition(this)" class="w-4 h-4 text-teal-600 rounded focus:ring-teal-500">
                                    <span class="text-sm font-medium text-slate-700">{{ __('consultation.part3_ven.none') }}</span>
                                </label>
                            </div>
                        </div>

                        {{-- Câu 4 --}}
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-800">
                                    {{ __('consultation.part3_ven.q4_photos_title') }} <span class="text-red-500">*</span>
                                </label>
                                <p class="text-xs text-slate-500 italic mt-0.5">
                                    {{ __('consultation.part3_ven.q4_photos_note') }}
                                </p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pl-1">
                                {{-- Photo 1 --}}
                                <div class="border border-slate-200 rounded-xl p-4 bg-slate-50 flex flex-col justify-between">
                                    <div>
                                        <span class="text-xs font-bold text-teal-600 uppercase tracking-wider block mb-1">
                                            {{ __('consultation.part3_ven.photo1_label') }}
                                        </span>
                                        <p class="text-sm font-medium text-slate-700 mb-3">
                                            {{ __('consultation.part3_ven.photo1_desc') }}
                                        </p>
                                    </div>
                                    <div>
                                        <label class="cursor-pointer bg-white border border-teal-600 text-teal-600 hover:bg-teal-50 text-xs font-semibold py-2 px-3 rounded-lg block text-center transition shadow-sm">
                                            <span>{{ __('consultation.part3_ven.btn_upload') }}</span>
                                            <input type="file" name="smile_photos[natural]" accept="image/*" {{ empty($savedSmilePhotos['natural']) ? 'required' : '' }} onchange="previewImage(this, 'preview_1')" class="hidden">
                                        </label>
                                        @error('smile_photos.natural')
                                            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                                        @enderror
                                        <img id="preview_1" src="{{ isset($savedSmilePhotos['natural']) ? asset('storage/' . $savedSmilePhotos['natural']) : '' }}" 
                                            class="{{ isset($savedSmilePhotos['natural']) ? '' : 'hidden' }} mt-3 w-full h-28 object-cover rounded-lg border border-slate-200">
                                    </div>
                                </div>

                                {{-- Photo 2 --}}
                                <div class="border border-slate-200 rounded-xl p-4 bg-slate-50 flex flex-col justify-between">
                                    <div>
                                        <span class="text-xs font-bold text-teal-600 uppercase tracking-wider block mb-1">
                                            {{ __('consultation.part3_ven.photo2_label') }}
                                        </span>
                                        <p class="text-sm font-medium text-slate-700 mb-3">
                                            {{ __('consultation.part3_ven.photo2_desc') }}
                                        </p>
                                    </div>
                                    <div>
                                        <label class="cursor-pointer bg-white border border-teal-600 text-teal-600 hover:bg-teal-50 text-xs font-semibold py-2 px-3 rounded-lg block text-center transition shadow-sm">
                                            <span>{{ __('consultation.part3_ven.btn_upload') }}</span>
                                            <input type="file" name="smile_photos[biting]" accept="image/*" {{ empty($savedSmilePhotos['biting']) ? 'required' : '' }} onchange="previewImage(this, 'preview_2')" class="hidden">
                                        </label>
                                        @error('smile_photos.biting')
                                            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                                        @enderror
                                        <img id="preview_2" src="{{ isset($savedSmilePhotos['biting']) ? asset('storage/' . $savedSmilePhotos['biting']) : '' }}" 
                                            class="{{ isset($savedSmilePhotos['biting']) ? '' : 'hidden' }} mt-3 w-full h-28 object-cover rounded-lg border border-slate-200">
                                    </div>
                                </div>

                                {{-- Photo 3 --}}
                                <div class="border border-slate-200 rounded-xl p-4 bg-slate-50 flex flex-col justify-between">
                                    <div>
                                        <span class="text-xs font-bold text-teal-600 uppercase tracking-wider block mb-1">
                                            {{ __('consultation.part3_ven.photo3_label') }}
                                        </span>
                                        <p class="text-sm font-medium text-slate-700 mb-3">
                                            {{ __('consultation.part3_ven.photo3_desc') }}
                                        </p>
                                    </div>
                                    <div>
                                        <label class="cursor-pointer bg-white border border-teal-600 text-teal-600 hover:bg-teal-50 text-xs font-semibold py-2 px-3 rounded-lg block text-center transition shadow-sm">
                                            <span>{{ __('consultation.part3_ven.btn_upload') }}</span>
                                            <input type="file" name="smile_photos[closeup]" accept="image/*" {{ empty($savedSmilePhotos['closeup']) ? 'required' : '' }} onchange="previewImage(this, 'preview_3')" class="hidden">
                                        </label>
                                        @error('smile_photos.closeup')
                                            <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                                        @enderror
                                        <img id="preview_3" src="{{ isset($savedSmilePhotos['closeup']) ? asset('storage/' . $savedSmilePhotos['closeup']) : '' }}" 
                                            class="{{ isset($savedSmilePhotos['closeup']) ? '' : 'hidden' }} mt-3 w-full h-28 object-cover rounded-lg border border-slate-200">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    <div class="p-6 bg-slate-100 rounded-lg text-slate-600 text-center font-medium">
                        Coming soon...
                    </div>
                @endif

                {{-- Nút Submit --}}
                <div class="pt-4">
                    <button type="submit" 
                        class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-teal-600/20 transition duration-200">
                        {{ !empty($consultation) ? __('Update Consultation') : __('consultation.button') }}
                    </button>
                </div>
            </form>

            <script>
                // Xử lý sự kiện bấm nút Enable Edit
                document.addEventListener('DOMContentLoaded', function() {
                    const enableEditBtn = document.getElementById('enableEditBtn');
                    const alreadySubmittedBox = document.getElementById('alreadySubmittedBox');
                    const consultationForm = document.getElementById('consultationForm');

                    if (enableEditBtn) {
                        enableEditBtn.addEventListener('click', function() {
                            alreadySubmittedBox.classList.add('hidden');
                            consultationForm.classList.remove('hidden');
                            consultationForm.scrollIntoView({ behavior: 'smooth' });
                        });
                    }
                });

                function toggleSmokingInput(show) {
                    const wrapper = document.getElementById('smoking_amount_wrapper');
                    if (wrapper) {
                        if (show) {
                            wrapper.classList.remove('hidden');
                        } else {
                            wrapper.classList.add('hidden');
                        }
                    }
                }

                function toggleXrayInput(show) {
                    const wrapper = document.getElementById('xray_file_wrapper');
                    const fileInput = document.getElementById('xray_file');
                    if (wrapper) {
                        if (show) {
                            wrapper.classList.remove('hidden');
                        } else {
                            wrapper.classList.add('hidden');
                            if (fileInput) {
                                fileInput.value = '';
                            }
                        }
                    }
                }

                function toggleNoneCondition(noneCheckbox) {
                    const otherCheckboxes = document.querySelectorAll('.condition-checkbox');
                    if (noneCheckbox.checked) {
                        otherCheckboxes.forEach(cb => cb.checked = false);
                    }
                }

                document.querySelectorAll('.condition-checkbox').forEach(cb => {
                    cb.addEventListener('change', function() {
                        if (this.checked) {
                            const noneCb = document.getElementById('none_condition');
                            if (noneCb) noneCb.checked = false;
                        }
                    });
                });

                function previewImage(input, previewId) {
                    const preview = document.getElementById(previewId);
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.classList.remove('hidden');
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        @endif
    </div>
    <script>
        function toggleSmokingInput(show) {
            const wrapper = document.getElementById('smoking_amount_wrapper');
            if (show) {
                wrapper.classList.remove('hidden');
            } else {
                wrapper.classList.add('hidden');
            }
        }

        function toggleXrayInput(show) {
            const wrapper = document.getElementById('xray_file_wrapper');
            const fileInput = document.getElementById('xray_file');
            if (show) {
                wrapper.classList.remove('hidden');
            } else {
                wrapper.classList.add('hidden');
                fileInput.value = ''; // Reset file chọn nếu đổi ý
            }
        }
    </script>
    <!-- Main Custom js file -->
</body>
</html>