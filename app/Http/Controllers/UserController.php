<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        $ticketPrice = $quantity * $ticket->price;
        
        $adminFee = $quantity * 35;

        $totalPrice = $ticketPrice + $adminFee;
        
        // dd($event);
        // return view('page.user.payment', compact('quantity', 'ticket', 'event', 
        // 'ticketPrice', 'adminFee', 'totalPrice'));
        return redirect()->route('user.payment',[
            'quantity' => $quantity,
            'ticket' => $ticket,
            'event' => $event,
            'ticketPrice' => $ticketPrice,
            'adminFee' => $adminFee,
            'totalPrice' => $totalPrice
        ]);
    }

    public function payment(Request $request){
        // dd($request);
        $quantity = $request->query('quantity');
        // dd($quantity);
        $ticket_id = $request->query('ticket');
        $event_id = $request->query('event');
        // dd($event_id);
        $ticketPrice = $request->query('ticketPrice');
        $adminFee = $request->query('adminFee');
        $totalPrice = $request->query('totalPrice');

        $event = Event::findorfail($event_id);
        $ticket = TicketCategory::findorfail($ticket_id);
        return view('page.user.payment', compact('quantity', 'ticket', 'event', 
        'ticketPrice', 'adminFee', 'totalPrice'));
    }
}
