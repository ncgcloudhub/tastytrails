<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Frontend\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SiteSettingController;
use App\Models\MenuCategory;
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

    // Add About Us From
    Route::get('/about/us', [AboutUsController::class, 'ManageAboutUs'])->name('manage.about.us');

    Route::post('/about/us/store', [AboutUsController::class, 'StoreAboutUs'])->name('store.about.us');

    Route::get('/about/us/edit/{id}', [AboutUsController::class, 'EditAboutUs'])->name('edit.about.us');

    Route::post('/about/us/update', [AboutUsController::class, 'UpdateAboutUs'])->name('update.about.us');
}); //End Admin Middleware



// User Middleware
Route::middleware(['auth', 'role:user'])->group(function () {

    // User Routes
    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
}); //End User Middleware


// GOOGLE SOCIALITE
Route::get('google/login', [UserController::class, 'provider'])->name('google.login');
Route::get('google/callback', [UserController::class, 'callbackHandel'])->name('google.login.callback');

// Banner
Route::get('/manage/banner', [BannerController::class, 'manageBanner'])->name('manage.banner');
Route::get('/add/banner', [BannerController::class, 'AddBanner'])->name('add.banner');
Route::post('/banner/store', [BannerController::class, 'storeBanner'])->name('banner.store');

// Menu Category
Route::get('/manage/menu/category', [MenuController::class, 'manageMenuCategory'])->name('manage.menu.category');
Route::post('/menu/category/store', [MenuController::class, 'storeMenuCategory'])->name('menu.category.store');

// Menu
Route::get('/manage/menu', [MenuController::class, 'manageMenu'])->name('manage.menu');
Route::post('/menu/store', [MenuController::class, 'storeMenu'])->name('menu.store');

// SiteSettings
Route::get('/site/settings/manage', [SiteSettingController::class, 'SitesettingsAdd'])->name('site.settings.add');
Route::post('/update-settings', [SiteSettingController::class, 'SitesettingsStore'])->name('update.settings');
