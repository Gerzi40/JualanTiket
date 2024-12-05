<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password'
    ];
    public function events(){
        return $this->hasMany('events');
    }
}
