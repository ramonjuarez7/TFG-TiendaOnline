<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    
    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function coupons(){
        return $this->belongsToMany('App\Coupon');
    }
}
