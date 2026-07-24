{{-- File: resources/views/survey/dental-implant.blade.php --}}
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Implant Assessment Form</title>

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
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased py-10 px-4">

    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
        
        {{-- Header Form --}}
        <div class="bg-teal-600 px-8 py-8 text-white" style="background:linear-gradient(135deg,#274289,#1d233b);">
            <h1 class="text-2xl sm:text-3xl font-bold tracking-tight mb-2">
                {{ __('consultation.title') }}
            </h1>
            <p class="text-teal-100 text-base">
                {{ __('consultation.title_head') }}, <span class="font-semibold text-white">{{ $appointment->fullname }}</span>! {{ __('consultation.title_head2') }}
            </p>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
            @csrf
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">{{ __('consultation.name') }}</label>
                    <input type="text" name="name" value="{{ old('name', $appointment->fullname ) }}" readonly
                        class="w-full bg-white border border-slate-300 rounded-lg px-3 py-2 text-slate-700 focus:outline-none cursor-not-allowed font-medium">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">{{ __('consultation.email') }}</label>
                    <input type="email" name="email" value="{{ old('email', $appointment->email ?? '') }}" readonly
                        class="w-full bg-white border border-slate-300 rounded-lg px-3 py-2 text-slate-700 focus:outline-none cursor-not-allowed font-medium">
                </div>
            </div>

            <hr class="border-slate-200">

            {{-- PART 1 --}}
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
                        <label class="block text-sm font-semibold text-slate-700 mb-1">{{ __('consultation.expected') }}</label>
                        <input type="date" name="arrival_date" required
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">{{ __('consultation.length') }}</label>
                        <input type="text" name="length_of_stay" placeholder="{{ __('consultation.length_holder') }}" required
                            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition">
                    </div>
                </div>
            </section>

            <hr class="border-slate-200">

            {{-- PART 2 --}}
            <section class="space-y-6">
                <h2 class="text-xl font-bold text-teal-700 flex items-center gap-2">
                    {{ __('consultation.part2') }}
                </h2>

                {{-- Câu 2 --}}
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-slate-800">
                        {{ __('consultation.part2_question') }}
                    </label>
                    <div class="space-y-2 pl-1">
                        <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                            <input type="radio" name="missing_teeth_duration" value="Less than 6 months" required class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                            <span class="text-sm text-slate-700">{{ __('consultation.part2_answer1') }}</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                            <input type="radio" name="missing_teeth_duration" value="6 months – 2 years" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                            <span class="text-sm text-slate-700">{{ __('consultation.part2_answer2') }}</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                            <input type="radio" name="missing_teeth_duration" value="More than 2 years" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                            <span class="text-sm text-slate-700">{{ __('consultation.part2_answer3') }}</span>
                        </label>
                    </div>
                </div>

                {{-- Câu 3 --}}
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-semibold text-slate-800">
                            {{ __('consultation.part3_question') }}
                        </label>
                        <p class="text-xs text-slate-500 italic mt-0.5">
                            {{ __('consultation.part3_note') }}
                        </p>
                    </div>
                    
                    <div class="space-y-2 pl-1">
                        <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                            <input type="radio" name="health_condition" value="Neither" required onclick="toggleSmokingInput(false)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                            <span class="text-sm text-slate-700">{{ __('consultation.part3_answer1') }}</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-teal-50/50 cursor-pointer transition">
                            <input type="radio" name="health_condition" value="Diabetes" onclick="toggleSmokingInput(false)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                            <span class="text-sm text-slate-700">{{ __('consultation.part3_answer2') }}</span>
                        </label>
                        
                        {{-- Smoke option --}}
                        <div class="border border-slate-200 rounded-lg p-3 hover:bg-teal-50/50 transition">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="health_condition" value="Smoke" onclick="toggleSmokingInput(true)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                <span class="text-sm text-slate-700">{{ __('consultation.part3_answer3') }}</span>
                            </label>
                            <div id="smoking_amount_wrapper" class="hidden mt-3 pl-7">
                                <input type="text" name="smoking_amount" placeholder="{{ __('consultation.part3_answer3_holder') }}"
                                    class="w-full text-sm border border-slate-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
                            </div>
                        </div>

                        {{-- Both option --}}
                        <div class="border border-slate-200 rounded-lg p-3 hover:bg-teal-50/50 transition">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="health_condition" value="Both" onclick="toggleSmokingInput(true)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                <span class="text-sm text-slate-700">{{ __('consultation.part3_answer4') }}</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Câu 4 --}}
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-semibold text-slate-800">
                            {{ __('consultation.part4_question') }}
                        </label>
                        <p class="text-xs text-slate-500 italic mt-0.5">
                            {{ __('consultation.part4_note') }}
                        </p>
                    </div>

                    <div class="space-y-3 pl-1">
                        {{-- Upload File Option --}}
                        <div class="border border-slate-200 rounded-lg p-4 space-y-3">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="radio" name="xray_option" value="upload" required onclick="toggleXrayInput(true)" class="w-4 h-4 text-teal-600 focus:ring-teal-500">
                                <span class="text-sm font-medium text-slate-700">{{ __('consultation.part4_answer1') }}</span>
                            </label>
                            
                            <div id="xray_file_wrapper" class="hidden pl-7">
                                <input type="file" name="xray_file" id="xray_file" accept="image/*,.pdf,.zip,.dcm"
                                    class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 cursor-pointer">
                            </div>
                        </div>

                        {{-- No File Option --}}
                        <div class="border border-slate-200 rounded-lg p-4">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <input type="radio" name="xray_option" value="no_xray" onclick="toggleXrayInput(false)" class="w-4 h-4 text-teal-600 focus:ring-teal-500 mt-0.5">
                                <span class="text-sm text-slate-700 leading-normal">
                                    {{ __('consultation.part4_answer2') }}
                                </span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Nút Submit --}}
            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-teal-600/20 transition duration-200">
                    {{ __('consultation.button') }}
                </button>
            </div>
        </form>
    </div>

    {{-- Script xử lý ẩn/hiện input phụ --}}
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
</body>
</html>