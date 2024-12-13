<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TicketCategory;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function makeTransaction(Request $request){
        
        // $validated = $request->validate([
        //     'payment_method' => 'required|string',
        //     'event_id' => 'required|integer',
        //     'ticket_id' => 'required|integer',
        //     'quantity' => 'required|integer',
        //     'total_price' => 'required|numeric',
        // ]);
        
        $user = Auth::user();
        $event_id = (int)$request->event_id;
        $ticketcategory_id = (int)$request->ticket_id;
        $quantity = (int)$request->quantity;
        $total_price = (int)$request->total_price;
        // dd($total_price, $quantity);
        Transaction::create([
            'user_id' => $user->id,
            'event_id' => $event_id,
            'ticketcategory_id' => $ticketcategory_id,
            'total_ticket' => $quantity,
            'total_price' => $total_price,
            'transaction_dateTime' => now(),
        ]);

        // kurangin stock
        $ticket = TicketCategory::findorfail($ticketcategory_id);

        $currStock = $ticket->stock;
        $newStock = $currStock - $quantity;

        $ticket->stock = $newStock;
        $ticket->save();
        
        return redirect()->route('user.getTransaction');
    }
    public function getTransactions(){

        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)->get();

        return view('page.user.transaction', compact('transactions'));
    }
}
