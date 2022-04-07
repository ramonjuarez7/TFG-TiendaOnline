<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
