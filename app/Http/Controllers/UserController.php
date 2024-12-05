<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('page.user.home', compact('events'));
    }
}
