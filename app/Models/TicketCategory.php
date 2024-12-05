<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    protected $table = 'ticketcategories';
    protected $fillable = [
        'name',
        'price',
        'event_id'
    ];
    public function event(){
        return $this->belongsTo('events');
    }
}
