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

    public function add()
    {
        return view('page.admin.add');
    }

    public function detail($id)
    {
        $event = Event::find($id);
        return view('page.admin.detail', compact('event'));
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
