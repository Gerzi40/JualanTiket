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
        'terms'
    ];
    public function transactions(){
        return $this->hasMany('transactions');
    }
    public function ticketcategories(){
        return $this->hasMany('ticketcategories');
    }
    public function admin(){
        return $this->belongsTo('admins');
    }
}
