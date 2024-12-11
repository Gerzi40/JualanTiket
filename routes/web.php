<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;

// Route::get('/', function () {
//     if (Auth::check()) {
//         Auth::logout();
//     }
//     return view('page.guest.home');
// });



Route::controller(AuthController::class)
    ->group(function () {
        // Login
        Route::get('/login', 'login')->name('login');
        Route::post('/login-user', 'attemptLogin')->name('auth.attemptLogin');

        // Register
        Route::get('/register', 'register')->name('register');
        Route::post('/register-user', 'attemptRegister')->name('auth.attemptRegister');

        // Logout
        Route::get('/logout', 'logout')->name('auth.logout');
    });

Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)
        ->name('user.')
        ->group(function () {
            Route::get('user/home', 'index')->name('home');
            Route::get('user/eventdetail/{id}', 'getEventDetail')->name('eventDetail');
            Route::get('user/eventlist', 'getEventList')->name('eventList');
            Route::post('user/payment', 'testOnly')->name('paymentTest');
        });
});

Route::middleware(['auth:admin'])->group(function () {
    Route::controller(AdminController::class)
        ->name('admin.')
        ->group(function () {
            Route::get('admin/home', 'index')->name('home');
            Route::get('admin/event/add', 'add')->name('add');
            Route::get('admin/event/{id}', 'detail')->name('detail');
            Route::get('admin/event/{id}/edit', 'edit')->name('edit');
            Route::get('admin/category', 'category')->name('category');
            Route::get('admin/transaction', 'transaction')->name('transaction');
        });
});

// guest
Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/eventlist', [EventController::class, 'getEventList'])->name('eventList');
Route::get('/eventdetail/{id}', [EventController::class, 'getEventDetail'])->name('eventDetail');

