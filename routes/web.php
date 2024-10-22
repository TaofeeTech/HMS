<?php

use App\Http\Controllers\Admin\BookingsController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\SystemSettingsController;

Route::prefix('admin')->group(function () {

    Route::controller(AdminAuthController::class)->group(function () {

        // Admin Auth Routes
        Route::get('/login', 'Main')->name('admin.login');
        Route::post('/loginreq', 'Login')->name('login.req');

    });

    Route::middleware('admin')->group(function(){

        // Admin Auth Routes
        Route::controller(AdminAuthController::class)->group(function () {

            Route::get('/dashboard', 'Index')->name('admin.dashboard');
            Route::get('/profile', 'profile')->name('admin.profile');
            Route::post('/update-profile-image', 'UpdateProfileImage')->name('admin.update.image');
            Route::post('/update-admin-info', 'UpdateAdminInfo')->name('update.admin.info');
            Route::post('/update-admin-password', 'UpdateAdminPassword')->name('update.admin.password');
            Route::get('/admin-logout', 'Logout')->name('admin.logout');

        });

        // Admin Routes
        Route::controller(AdminController::class)->group(function (){

            Route::get('/add-room-details', 'AddRoomDetails')->name('add.room.details');
            Route::post('/add-room', 'StoreRoomDetails')->name('store.room.details');
            Route::get('/rooms', 'Rooms')->name('rooms');
            Route::get('/room-edit/{id}', 'EditRoomDetails')->name('edit.room.details');
            Route::post('/room-update', 'UpdateRoomDetails')->name('update.room.details');
            Route::get('/room-delete/{id}', 'DeleteRoom')->name('delete.room');

        });

        // System Setting Routes
        Route::controller(SystemSettingsController::class)->group(function (){

            Route::get('/settings', 'Settings')->name('system.setting');
            Route::post('/save-settings', 'SaveSettings')->name('save.settings');

        });

    });

});

Route::controller(CartController::class)->group(function () {

    Route::get('/cart', 'index')->name('cart');
    Route::get("/add-to-cart/{id}", "AddToCart")->name("add.cart");
    Route::get("remove-from-cart/{id}", "RemoveItemFromCart")->name("remove.cart");

});

Route::controller(BookingsController::class)->group(function () {

    Route::post('/room-search', 'Search')->name("room.search");
    Route::get('/rooms/result', 'SearchResult')->name("room.result");


});

Route::controller(HomeController::class)->group(function () {

    Route::get('/room-details/{id}', 'RoomDetails')->name('room.details');

});




















Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
