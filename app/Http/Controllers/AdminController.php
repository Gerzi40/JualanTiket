<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $events = Event::get();
        return view('page.admin.home', compact('events'));
    }

    public function add()
    {
        $userId = Auth::user()->id;
        return view('page.admin.add', compact('userId'));
    }

    public function detail($id)
    {
        $userId = Auth::user()->id;
        $event = Event::find($id);
        return view('page.admin.detail', compact('userId', 'event'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('page.admin.edit', compact('event'));
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
