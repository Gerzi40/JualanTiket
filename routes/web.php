<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('page.admin.home');
});

Route::controller(AuthController::class)
    ->group(function () {
        // Login
        Route::get('/login', 'login')->name('login');
        Route::post('/login-user', 'attemptLogin')->name('auth.attemptLogin');

        // Register
        Route::get('/register', 'register')->name('register');
        Route::post('/register-user', 'attemptRegister')->name('auth.attemptRegister');

        // Logout
        Route::post('/logout', 'logout')->name('auth.logout');
    });

// user/customer
Route::get('/eventlist', function(){return view('page.user.event');});

//admin
