<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('clinics.page_title') }}</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans text-slate-700 antialiased">

    <!-- HEADER NAVIGATION -->
    <header class="bg-slate-900 text-white py-4 shadow-md">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">VIETNAM DENTAL CARE</h1>
            <a href="{{ url('/') }}" class="text-sm text-sky-400 hover:underline"><i class="fa-solid fa-house"></i> {{ __('clinics.header_home') }}</a>
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
                    <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-filter text-sky-600"></i> {{ __('clinics.filter_title') }}
                    </h3>

                    <form action="{{ route('clinics.index') }}" method="GET">
                        <!-- Giữ lại thông tin dịch vụ đã chọn từ bước trước -->
                        @if(request('services'))
                            @foreach(request('services') as $sId)
                                <input type="hidden" name="services[]" value="{{ $sId }}">
                            @endforeach
                        @endif

                        <!-- Vị trí địa lý -->
                        <div class="mb-4">
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">{{ __('clinics.location_label') }}</label>
                            <select name="district_id" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none">
                                <option value="">{{ __('clinics.all_locations') }}</option>
                                <option value="1" {{ request('district_id') == 1 ? 'selected' : '' }}>{{ __('clinics.location_q1') }}</option>
                                <option value="5" {{ request('district_id') == 5 ? 'selected' : '' }}>{{ __('clinics.location_q5') }}</option>
                                <option value="7" {{ request('district_id') == 7 ? 'selected' : '' }}>{{ __('clinics.location_q7') }}</option>
                            </select>
                        </div>

                        <!-- Ngôn ngữ giao tiếp -->
                        <div class="mb-4">
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">{{ __('clinics.language_label') }}</label>
                            <select name="support_type" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none">
                                <option value="">{{ __('clinics.all_languages') }}</option>
                                <option value="free_english" {{ request('support_type') == 'free_english' ? 'selected' : '' }}>
                                    {{ __('clinics.lang_free') }}
                                </option>
                                <option value="paid_interpreter" {{ request('support_type') == 'paid_interpreter' ? 'selected' : '' }}>
                                    {{ __('clinics.lang_paid') }}
                                </option>
                            </select>
                        </div>

                        <!-- Chuyên môn Bác sĩ -->
                        <div class="mb-6">
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">{{ __('clinics.specialty_label') }}</label>
                            <select name="doctor_specialty" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-sky-500 focus:outline-none">
                                <option value="">{{ __('clinics.all_specialties') }}</option>
                                <option value="foreign_trained" {{ request('doctor_specialty') == 'foreign_trained' ? 'selected' : '' }}>{{ __('clinics.spec_foreign') }}</option>
                                <option value="expert_10_years" {{ request('doctor_specialty') == 'expert_10_years' ? 'selected' : '' }}>{{ __('clinics.spec_expert') }}</option>
                                <option value="high_degree" {{ request('doctor_specialty') == 'high_degree' ? 'selected' : '' }}>{{ __('clinics.spec_degree') }}</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2.5 rounded-lg text-sm transition-colors shadow-sm">
                            {{ __('clinics.apply_filter') }}
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
                                <a href="{{ route('clinics.show', $clinic->id) }}" 
                                   class="px-4 py-2 border border-slate-300 hover:border-slate-400 text-slate-700 text-sm font-semibold rounded-lg transition-colors">
                                   {{ __('clinics.btn_details') }}
                                </a>

                                <!-- Nút Book Online Consultation -->
                                <a href="{{ route('clinics.show', $clinic->id) }}#booking-section" 
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