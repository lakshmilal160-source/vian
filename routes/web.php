<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\PageContentController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/services', [WebsiteController::class, 'service'])->name('services');
Route::get('/portfolio', [WebsiteController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact/store', [WebsiteController::class, 'storeContact'])->name('contact.store');
// Route::get('/', function () {
    // return view('frontend.layouts.app');
// });

//Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'loginPost'])
        ->name('login.post');
    Route::middleware(['admin'])->group(function () {

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
        Route::resource('page-content', PageContentController::class);

        Route::resource('services', ServiceController::class);
        Route::post('services/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('services.toggle-status');

        Route::resource('testimonials', TestimonialController::class);
        Route::post('testimonials/{testimonial}/toggle-status', [TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle-status');

        Route::resource('portfolios', PortfolioController::class);
        Route::post('portfolios/{portfolio}/toggle-status', [PortfolioController::class, 'toggleStatus'])->name('portfolios.toggleStatus');

        Route::resource('clients', ClientController::class);
        Route::post('clients/{client}/toggle-status', [ClientController::class, 'toggleStatus'])->name('clients.toggleStatus');

        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        Route::patch('/contacts/{contact}/toggle-status', [ContactController::class, 'toggleStatus'])->name('contacts.toggleStatus');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });
});
