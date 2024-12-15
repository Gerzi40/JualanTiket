<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'ticketcategory_id',
        'total_ticket',
        'total_price',
        'transaction_dateTime'
    ];
    protected $casts = [
        'transaction_dateTime' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function ticketcategory()
    {
        return $this->belongsTo(TicketCategory::class);
    }
}
