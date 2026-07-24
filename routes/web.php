<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

Route::get('/generate-sitemap', function () {
    SitemapGenerator::create(config('app.url'))
        ->writeToFile(public_path('sitemap.xml'));
    return 'Sitemap generated!';
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'vi|en'],
    'middleware' => 'localization',
], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});

Route::get('/about-us', function () {
    return view('about_us');
})->name('about-us');

Route::middleware('localization')->group(function () {
    Route::get('/', function() { return view('welcome'); })->name('home');
    Route::get('/about-us', function() { return view('about_us'); })->name('about-us');
    Route::get('/consultation/{token}', [ProfileController::class, 'show'])->name('consultation');
});

Route::prefix('{locale}')
    ->where(['locale' => 'vi|ja|ko'])
    ->middleware('localization')
    ->group(function () {
    Route::get('/', function() { return view('welcome'); })->name('locale.home');
    Route::get('/about-us', function() { return view('about_us'); })->name('locale.about');
    Route::get('/consultation/{token}', [ProfileController::class, 'show'])->name('locale.consultation');
});


Route::middleware('auth')->group(function () {
    Route::view(
        '/dashboard',
        'dashboard'
    )->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
