<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function coupons(){
        return $this->belongsToMany('App\Coupon');
    }
}
