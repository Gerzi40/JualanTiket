<?php

namespace App\Http\Controllers;

use App\Models\TicketCategory;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function getTickets()
    {
        $tickets = TicketCategory::all();

        return view('page.admin.tickethome', compact('tickets'));
    }
}
