<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $events = Event::get();
        return view('page.admin.home', compact('events'));
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
