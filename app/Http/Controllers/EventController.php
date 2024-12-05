<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // guest role
    public function index()
    {
        $events = Event::all();
        // dd($events);
        return view('page.guest.home', compact('events'));
    }
    public function getEventDetail($id)
    {
        $event = Event::findorfail($id);
        return view('page.guest.detail', compact('event'));
    }
    public function getEventList()
    {
        $events = Event::paginate(3);
        return view('page.guest.event', compact('events'));
    }
}
