<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Frontend\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontEndController::class, 'home'])->name('home');
Route::get('/menu', [FrontEndController::class, 'menu'])->name('menu');
Route::get('/about', [FrontEndController::class, 'about'])->name('about');
Route::get('/gallery', [FrontEndController::class, 'gallery'])->name('gallery');
Route::get('/stuff', [FrontEndController::class, 'stuff'])->name('stuff');
Route::get('/reservation', [FrontEndController::class, 'reservation'])->name('reservation');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');
Route::get('/blog', [FrontEndController::class, 'blog'])->name('blog');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Admin Routes
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
}); //End Admin Middleware



// User Middleware
Route::middleware(['auth', 'role:user'])->group(function () {

    // User Routes
    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
}); //End User Middleware

// Site Settings
Route::prefix('settings/site')->group(function () {

    Route::get('/add', [SiteSettingsController::class, 'SitesettingsAdd'])->name('site.settings.add');

    Route::post('/store', [SiteSettingsController::class, 'SitesettingsStore'])->name('site.settings.store');
});

// GOOGLE SOCIALITE
Route::get('google/login', [UserController::class, 'provider'])->name('google.login');
Route::get('google/callback', [UserController::class, 'callbackHandel'])->name('google.login.callback');


// Banner
Route::get('/add/banner', [BannerController::class, 'manageBanner'])->name('manage.banner');

Route::post('/banner/store', [BannerController::class, 'storeBanner'])->name('banner.store');