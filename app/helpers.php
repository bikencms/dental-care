<?php 
if (!function_exists('localized_route')) {
    function localized_route($name, $parameters = []) {
        $locale = app()->getLocale();
        $defaultLocale = config('app.fallback_locale', 'en'); // Ngôn ngữ mặc định (ví dụ 'en')

        // Danh sách các ngôn ngữ có prefix
        $supportedLocales = ['vi', 'ja', 'ko'];

        if ($locale !== $defaultLocale && in_array($locale, $supportedLocales)) {
            // Nếu ngôn ngữ hiện tại nằm trong vi|ja|ko
            $localeRouteName = "locale.{$name}";
            $parameters = array_merge(['locale' => $locale], (array) $parameters);

            return route($localeRouteName, $parameters);
        }

        // Nếu là ngôn ngữ mặc định (ví dụ 'en')
        return route($name, $parameters);
    }
}

if (!function_exists('switch_locale_url')) {
    /**
     * Tạo URL cho trang hiện tại theo ngôn ngữ mới chọn
     *
     * @param string $targetLocale ('en', 'vi', 'ja', 'ko')
     * @return string
     */
    function switch_locale_url($targetLocale) {
        $currentRouteName = Route::currentRouteName();
        $parameters = Route::current() ? Route::current()->parameters() : [];

        // Nếu trang hiện tại không có route name (lỗi 404,...)
        if (!$currentRouteName) {
            return url('/');
        }

        // Bỏ tiền tố 'locale.' nếu đang ở route ngôn ngữ phụ
        $baseRouteName = str_replace('locale.', '', $currentRouteName);

        // Bỏ tham số 'locale' cũ ra khỏi tham số route
        unset($parameters['locale']);

        // Lưu tạm ngôn ngữ hiện tại của ứng dụng
        $originalLocale = app()->getLocale();

        // Đổi tạm ngôn ngữ app sang ngôn ngữ mục tiêu để hàm localized_route xử lý
        app()->setLocale($targetLocale);

        // Tạo URL mới
        $url = localized_route($baseRouteName, $parameters);

        // Khôi phục lại ngôn ngữ ban đầu cho ứng dụng
        app()->setLocale($originalLocale);

        return $url;
    }
}
