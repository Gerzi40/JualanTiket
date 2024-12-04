<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function getEventList(){
        $events = Event::all();
        return view('page.user.event', compact('events'));
    }

    public function getEventDetail($id){
        $eventDetail = Event::findorfail($id);
        return view('page.user.detail', compact('eventDetail'));
    }
}
