<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('page.admin.home');
    }

    public function category()
    {
        return view('page.admin.category');
    }

    public function transaction()
    {
        return view('page.admin.transaction');
    }
}
