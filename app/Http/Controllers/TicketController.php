<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\TicketCategory;

class TicketController extends Controller
{
    public function createTicket(Request $request){
        
        $request->validate([
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'deadline' => 'required|date|after_or_equal:today',
            'stock' => 'required|integer|min:1',
        ]);
        
        TicketCategory::create([
            'name' => $request->category,
            'price' => $request->price,
            'event_id' => $request->event_id,
            'deadline' => $request->deadline,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.manageTicket', ['id' => $request->event_id])->with('success', 'Ticket has been added successfully!');
    }

    public function editTicket(Request $request){

        $request->validate([
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'deadline' => 'required|date|after_or_equal:today',
            'stock' => 'required|integer|min:0',
        ]);

        $ticket = TicketCategory::findorfail($request->id);
        $ticket->name = $request->category;
        $ticket->price = $request->price;
        $ticket->deadline = $request->deadline;
        $ticket->stock = $request->stock;
        $event = $ticket->event_id;
        $ticket->save();

        return redirect()->route('admin.manageTicket', ['id' => $event])->with('success', 'Data has been saved successfully!');
    }

    public function deleteTicket($id) {
        try {
            $ticket = TicketCategory::findOrFail($id);
    
            // Debugging
            if (!$ticket) {
                return back()->withErrors('Ticket not found!');
            }
    
            $ticket->delete();
    
            return redirect()->route('admin.manageTicket', ['id' => $ticket->event_id])
                ->with('success', 'Data has been deleted successfully!');
        } catch (Exception $e) {
            return back()->withErrors('Failed to delete the ticket: ' . $e->getMessage());
        }
    }
    
}
