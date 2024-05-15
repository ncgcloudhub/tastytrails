<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Frontend\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\ProfileEditController;
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

    // Gallery From
    Route::get('/gallery/add', [GalleryController::class, 'AddGallery'])->name('add.gallery');

    Route::post('/gallery/store', [GalleryController::class, 'StoreGallery'])->name('store.gallery');

    Route::get('/gallery/edit/{id}', [GalleryController::class, 'EditGallery'])->name('edit.gallery');

    Route::post('/gallery/update', [GalleryController::class, 'UpdateGallery'])->name('update.gallery');

    Route::get('/gallery/delete/{id}', [GalleryController::class, 'DeleteGallery'])->name('delete.gallery');

    // Site Settings
    Route::prefix('settings/site')->group(function () {

        Route::get('/add', [SiteSettingController::class, 'SitesettingsAdd'])->name('site.settings.add');
        Route::post('/store', [SiteSettingController::class, 'SitesettingsStore'])->name('update.settings');
    });

    // Banner
    Route::get('/banner/manage', [BannerController::class, 'manageBanner'])->name('manage.banner');

    Route::get('/banner/add', [BannerController::class, 'AddBanner'])->name('add.banner');

    Route::post('/banner/store', [BannerController::class, 'storeBanner'])->name('store.banner');

    Route::get('/banner/edit/{id}', [BannerController::class, 'editBanner'])->name('edit.banner');

    Route::post('/banner/update', [BannerController::class, 'updateBanner'])->name('update.banner');

    Route::get('/banner/delete/{id}', [BannerController::class, 'deleteBanner'])->name('delete.banner');

    // Menu Category
    Route::get('/manage/menu/category', [MenuController::class, 'manageMenuCategory'])->name('manage.menu.category');

    Route::post('/menu/category/store', [MenuController::class, 'storeMenuCategory'])->name('store.menu.category');

    Route::get('/menu/category/edit/{id}', [MenuController::class, 'editMenuCategory'])->name('edit.menu.category');

    Route::post('/menu/category/update', [MenuController::class, 'updateMenuCategory'])->name('update.menu.category');

    Route::get('/menu/category/delete/{id}', [MenuController::class, 'deleteMenuCategory'])->name('delete.menu.category');

    // Menu
    Route::get('/manage/menu', [MenuController::class, 'manageMenu'])->name('manage.menu');

    Route::post('/menu/store', [MenuController::class, 'storeMenu'])->name('store.menu');

    Route::get('/menu/edit/{id}', [MenuController::class, 'editMenu'])->name('edit.menu');

    Route::post('/menu/update', [MenuController::class, 'updateMenu'])->name('update.menu');

    Route::get('/menu/delete/{id}', [MenuController::class, 'deleteMenu'])->name('delete.menu');

    // Moderator
    Route::get('/add/moderator', [ModeratorController::class, 'addModerator'])->name('add.moderator');
    Route::post('/moderator/store', [ModeratorController::class, 'storeModerator'])->name('users.store');
    Route::get('/manage/moderator', [ModeratorController::class, 'ManageModerator'])->name('manage.moderator');

    // ProfileController
    Route::get('/password/change', [ProfileEditController::class, 'ProfileEdit'])->name('edit.profile');
}); //End Admin Middleware



// User Middleware
Route::middleware(['auth', 'role:user'])->group(function () {

    // User Routes
    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');
}); //End User Middleware


// GOOGLE SOCIALITE
Route::get('google/login', [UserController::class, 'provider'])->name('google.login');
Route::get('google/callback', [UserController::class, 'callbackHandel'])->name('google.login.callback');

//Contact Us Send Mail
Route::post('/send-email', [FrontEndController::class, 'sendEmail'])->name('send.email');
