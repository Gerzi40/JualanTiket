<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'image',
        'price',
        'location',
        'date',
        'time',
        'description',
        'terms',
        'admin_id'
    ];
    protected $casts = [
        'date' => 'datetime'
    ];
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function ticketcategories(){
        return $this->hasMany(TicketCategory::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
