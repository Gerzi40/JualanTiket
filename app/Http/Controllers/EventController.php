<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketCategory;
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
        $tickets = TicketCategory::with('event')->where('event_id', $id)->get();
        return view('page.guest.detail', compact('event', 'tickets'));
    }
    public function getEventList(Request $req)
    {
        $sort = $req->query('sort');

        if($sort && $sort != "") {
            $events = Event::orderBy($sort, 'asc')->paginate(3);
        } else {
            $events = Event::paginate(3);
        }

        return view('page.guest.event', compact('events'));
    }
}
