<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        // $event_id = (int)$request->event_id;
        // $ticketcategory_id = (int)$request->ticket_id;
        // $quantity = (int)$request->quantity;
        // $total_price = (int)$request->total_price;

        $validated = $request->validate([
            'ticket_id' => 'required|exists:ticketcategories,id', // Validasi bahwa tiket valid
            'quantity' => 'required|integer|min:1',    // Jumlah harus minimal 1
        ]);

        $ticketId = (int)$validated['ticket_id'];

        // ini quantitynya
        $quantity = (int)$validated['quantity'];
        // ini ticket yang dipilih
        $ticket = TicketCategory::findorfail($ticketId);

        // cari eventnya
        $event = Event::findorfail($ticket->event_id);

        $ticketPrice = $quantity * $ticket->price;

        $adminFee = $quantity * 10000;

        $totalPrice = $ticketPrice + $adminFee;
        $transactions = Transaction::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'ticketcategory_id' => $ticketId,
            'total_ticket' => $quantity,
            'total_price' => $totalPrice,
            'transaction_dateTime' => now(),
        ]);

        // dd($transactions);

        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transactions->id,
                'gross_amount' => $transactions->total_price,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transactions->snap_token = $snapToken;
        $transactions->save();

        $transaction_id = $transactions->id;


        // dd($transactions);
        // kurangin stock
        // $ticket = TicketCategory::findorfail($ticketId);

        $currStock = $ticket->stock;
        $newStock = $currStock - $quantity;

        $ticket->stock = $newStock;
        $ticket->save();

        return redirect()->route('user.payment', [
            'quantity' => $quantity,
            'ticket' => $ticket,
            'event' => $event,
            'ticketPrice' => $ticketPrice,
            'adminFee' => $adminFee,
            'totalPrice' => $totalPrice,
            'transaction_id' => $transaction_id,
        ]);
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

    public function changeStatus($id){
        $transaction = Transaction::findorfail($id);

        $transaction->status = 'paid';
        $transaction->save();

        return redirect()->route('user.getTransaction');
    }
}
