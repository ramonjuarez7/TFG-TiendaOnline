<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/*
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;*/

class User extends Authenticatable
{
    use HasFactory; //, Billable;

    /*
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password'];

	protected $hidden = ['password', 'remember_token'];*/
    
    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

    public function coupons(){
        return $this->belongsToMany('App\Models\Coupon');
    }

    public function addCoupon($coupon, $qty){
        $coupon->users()->attach($this->id,['Cantidad' => $qty]);
    }
}
