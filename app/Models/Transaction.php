<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'total_ticket'
    ];
    public function user(){
        return $this->belongsTo('users');
    }
    public function event(){
        return $this->belongsTo('events');
    }
}
