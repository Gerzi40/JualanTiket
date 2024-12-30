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

    public function searchEvent(Request $req)
    {
        $events = Event::where('name', 'LIKE', '%' . $req->inputSearch . '%')->paginate(4);

        return view('page.guest.event', compact('events'));
    }

    public function getEventList(Request $req)
    {
        $query = Event::query();

        if ($req->has('inputSearch') && $req->input('inputSearch') !== '') {
            $query->where('name', 'LIKE', '%' . $req->input('inputSearch') . '%');
        }

        $sort = $req->input('sort');
        if ($sort && in_array($sort, ['name', 'price', 'date'])) {
            if ($sort == 'price') {
                $query->orderByRaw('CAST(price AS DECIMAL(10, 2)) ASC');
            } else {
                $query->orderBy($sort, 'asc');
            }
        }

        $events = $query->paginate(4);
        $events->appends($req->except('page'));

        return view('page.guest.event', compact('events'));
    }


    public function create(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'date' => 'required|date',
            'time' => [
                'required',
                'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]\s*-\s*([01]?[0-9]|2[0-3]):[0-5][0-9]$/'
            ],
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
            'time' => [
                'required',
                'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]\s*-\s*([01]?[0-9]|2[0-3]):[0-5][0-9]$/'
            ],
            'description' => 'required',
            'terms' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        if ($req->hasFile('image') && $req->file('image')->isValid()) {
            $posterFile = $req->file('image');
            $posterPath = 'assets/events';
            $posterName = $posterFile->getClientOriginalName();

            $posterFile->move(public_path($posterPath), $posterName);

            $data['image'] = "$posterPath/$posterName";
        }

        $event = Event::find($req->id);
        $event->price = $req->price;
        $event->location = $req->location;
        $event->date = $req->date;
        $event->time = $req->time;
        $event->description = $req->description;
        $event->terms = $req->terms;
        $event->image = $data['image'];
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
