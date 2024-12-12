<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketCategory;
use Exception;
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

        if ($sort && $sort != "") {
            $events = Event::orderBy($sort, 'asc')->paginate(2);
        } else {
            $events = Event::paginate(2);
        }

        return view('page.guest.event', compact('events'));
    }

    public function create(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'required',
            'terms' => 'required',
            'admin_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        if ($req->hasFile('image') && $req->file('image')->isValid()) {
            $posterFile = $req->file('image');
            $posterPath = 'assets/events';
            $posterName = $posterFile->getClientOriginalName();

            $posterFile->move(public_path($posterPath), $posterName);

            $data['image'] = "$posterPath/$posterName";
        }

        Event::create($data);
        return redirect()->route('admin.home');
    }

    public function update(Request $req)
    {
        $req->validate([
            'image' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'required',
            'terms' => 'required',
        ]);

        $event = Event::find($req->id);
        $event->price = $req->price;
        $event->location = $req->location;
        $event->date = $req->date;
        $event->time = $req->time;
        $event->description = $req->description;
        $event->terms = $req->terms;
        $event->save();

        return redirect()->route('admin.home');
    }

    public function delete($id)
    {
        try {
            $res = Event::where('id', $id)->delete();
            return back();
        } catch (Exception $e) {
        }
    }
}
