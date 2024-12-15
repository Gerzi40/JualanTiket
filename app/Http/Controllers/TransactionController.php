<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TicketCategory;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function makeTransaction(Request $request)
    {

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

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => $total_price,
        //     )
        // );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);

        // $transactions->snap_token = $snapToken;
        // $transactions->save();


        // kurangin stock
        $ticket = TicketCategory::findorfail($ticketcategory_id);

        $currStock = $ticket->stock;
        $newStock = $currStock - $quantity;

        $ticket->stock = $newStock;
        $ticket->save();

        return redirect()->route('user.getTransaction');
    }
    public function getTransactions()
    {

        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)->get();

        return view('page.user.transaction', compact('transactions'));
    }

    public function getAllTransactions()
    {
        $transactions = Transaction::with(['event', 'ticketcategory'])->get();

        return view('page.admin.transaction', compact('transactions'));
    }
}
