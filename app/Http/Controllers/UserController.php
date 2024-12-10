<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketCategory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('page.user.home', compact('events'));
    }

    public function getEventList()
    {
        $events = Event::paginate(3);
        return view('page.user.event', compact('events'));
    }

    public function getEventDetail($id)
    {
        $event = Event::findorfail($id);
        $tickets = TicketCategory::with('event')->where('event_id', $id)->get();
        return view('page.user.detail', compact('event', 'tickets'));
    }

    public function testOnly(Request $request){

        $validated = $request->validate([
            'ticket_id' => 'required|exists:ticketcategories,id', // Validasi bahwa tiket valid
            'quantity' => 'required|integer|min:1',    // Jumlah harus minimal 1
        ]);
    
        $ticketId = $validated['ticket_id'];

        // ini quantitynya
        $quantity = $validated['quantity'];
    
        // ini ticket yang dipilih
        $ticket = TicketCategory::findorfail($ticketId);

        // cari eventnya
        $event = Event::findorfail($ticket->event_id);
        
        // dd($event);
        return view('page.user.payment', compact('quantity', 'ticket', 'event'));
    }
}
