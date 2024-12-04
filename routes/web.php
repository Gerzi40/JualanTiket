<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.admin.home');
});

// user/customer
Route::get('/eventlist', function(){return view('page.user.event');});

//admin
