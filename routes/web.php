<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;

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
            Route::get('user/eventdetail/{id}', 'getEventDetail')->name('userEventDetail');
            Route::get('user/eventlist', 'getEventList')->name('userEventList');
            Route::post('user/eventlist', 'searchEvent')->name('userSearchEvent');
            Route::get('user/payment', 'payment')->name('payment');
            Route::post('user/paymentDetail', 'testOnly')->name('paymentDetail');
        });
    Route::controller(TransactionController::class)
        ->name('user.')
        ->group(function () {
            Route::post('user/makeTransaction', 'makeTransaction')->name('makeTransaction');
            Route::get('user/TransactionHistory', 'getTransactions')->name('getTransaction');
            Route::post('user/changeStatus/{id}', 'changeStatus')->name('changeStatus');
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
            Route::get('/admin/ticket', [TicketController::class, 'getTickets'])->name('tickethome');
            Route::get('/admin/transaction', [TransactionController::class, 'getAllTransactions'])->name('transaction');
        });
});

// guest
Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/eventlist', [EventController::class, 'getEventList'])->name('eventList');
Route::post('/eventlist', [EventController::class, 'searchEvent'])->name('searchEvent');
Route::get('/eventdetail/{id}', [EventController::class, 'getEventDetail'])->name('eventDetail');

// Localization
Route::get('locale/{lang}', [LocaleController::class, 'setLocale'])->name('setLocale');

// API
Route::post('/api/event', [EventController::class, 'create'])->name('api.event.create');
Route::put('/api/event', [EventController::class, 'update'])->name('api.event.update');
Route::delete('/api/event/{id}', [EventController::class, 'delete'])->name('api.event.delete');
