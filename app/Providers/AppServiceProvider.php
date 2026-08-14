<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // Import namespace này
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Đặt giao diện pagination mặc định toàn hệ thống
        Paginator::defaultView('auth.pagination.custom');

        // Ép buộc toàn bộ route/URL sử dụng HTTPS khi chạy trên Production
        if (config('app.env') === 'production' || request()->secure()) {
            URL::forceScheme('https');
        }
    }
}
