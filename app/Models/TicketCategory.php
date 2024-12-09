<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    protected $table = 'ticketcategories';
    protected $fillable = [
        'name',
        'price',
        'event_id',
        'deadline',
        'stock'
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }
}
