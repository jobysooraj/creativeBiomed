<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'user-access:Admin', 'prevent-back-history'])->group(function () {
  
    Route::get('/admin-home', [AdminHome::class, 'index'])->name('admin.home');
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('aboutuses', AboutUsController::class);
    Route::resource('teams', TeamMemberController::class);
    Route::resource('contactuses', ContactUsController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('portfolios', PortfolioController::class);
  

});
Route::name('website.')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [HomeController::class, 'about'])->name('about');
    Route::get('/service/{id}', [HomeController::class, 'services'])->name('service');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');