<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Booking;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\Guest\GuestController;

/*---------------------------------Admin Auth Route ------------------------ */

Route::controller(AdminAuthController::class)->prefix("admin")->group(function () {

    Route::get('/login', 'Main')->name('admin.login');
    Route::post('/login/auth', 'Login')->name('admin.login.req');

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', 'AdminIndex')->name('admin.dashboard');
        Route::get('/logout', 'Logout')->name('admin.logout');

    });

});

/*-------------------------------End Admin Auth Route ------------------------ */

/*---------------------------------Admin Route ------------------------ */

Route::controller(AdminController::class)->middleware('admin')->prefix('admin')->group(function () {

    /**
     * Room Category Routes.
     */
    Route::get('/room/categories', 'AllRoomCategory')->name('room.cats');
    Route::get('/room/categories/add', 'AddRoomCategory')->name('room.cats.add');
    Route::post('/room/categories/req', 'StoreRoomCategory')->name('room.cats.store');
    Route::get('/room/category/{id}', 'EditRoomCategory')->name('room.cats.edit');
    Route::post('/room/category/update', 'UpdateRoomCategory')->name('room.cats.update');
    Route::get('/room/category/delete/{id}', 'DeleteRoomCategory')->name('room.cats.del');

    /**
     * Room Routes.
     */
    Route::get('/rooms/all', 'AllRooms')->name('rooms.all');
    Route::get('/room/add', 'AddRoom')->name('rooms.add');
    Route::post('/room/add/req', 'StoreRoom')->name('rooms.add.store');
    Route::get('/room/edit/{id}', 'EditRoom')->name('room.edit');
    Route::post('/room/update', 'UpdateRoom')->name('room.update');
    Route::get('/room/del/{id}', 'DeleteRoom')->name('room.del');

    /**
     * Bookings Routes.
     */
    Route::get('/bookings', 'AllBookings')->name('all.bookings');

});

/*---------------------------------End Admin Route ------------------------ */


/*---------------------------------Bookings Route ------------------------ */

Route::controller(Booking::class)->middleware('auth')->group(function () {

    Route::post('/book', 'StoreBookings')->name('bookRoom');
    Route::get('/main', 'Home')->name('home');
    Route::get('/alternative_rooms/{roomIds}', 'AlternativeRooms')->name('alternative.rooms');
    Route::post('/room/book', 'BookAlternativeRoom')->name('alternative.book');
    Route::post('/payment/paystack', 'MakePaymentPaystack')->name('payment.paystack');
    Route::get('/paystack/callback', 'callback')->name('paystack.callback');

});

/*---------------------------------End Bookings Route ------------------------ */

/*---------------------------------Guest Route ------------------------ */
Route::controller(GuestController::class)->middleware('auth')->group(function () {
    Route::get('/account', 'Profile')->name('account');
});
/*---------------------------------End Guest Route ------------------------ */

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::post('initialize-transaction', [PaystackController::class, 'initializeTransaction'])->name('initialize-transaction');
// Route::get('success', [PaystackController::class, 'success'])->name('success');
// Route::get('cancel', [PaystackController::class, 'cancel'])->name('cancel');

// Route::post('/pay', [App\Http\Controllers\PaystackController::class, 'redirectToGateway'])->name('pay');

// Route::get('/payment/callback', [App\Http\Controllers\PaystackController::class, 'handleGatewayCallback'])->name('callback');
// Route::post('/pay_save', [App\Http\Controllers\PaystackController::class, 'pay_save'])->name('pay_save');
// Route::get('/callback', [App\Http\Controllers\PaystackController::class, 'callback'])->name('callback');


route::get('paystack', function(){
    return view('welcome');
})->name('paystack');

require __DIR__ . '/auth.php';
