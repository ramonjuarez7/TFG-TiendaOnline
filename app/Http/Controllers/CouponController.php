<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\Product;
use App\Models\User;

use ShoppingCart;

class CouponController extends Controller
{
    public function index(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $email = \Auth::user()->Email;
        $usuario = User::where('Email',$email)->firstOrFail();
        $cupones = \DB::select('SELECT * FROM coupon_user WHERE user_id = '.$usuario->id);
        return view('coupons.index')->with('supercategories', $sc)->with('concretecategories', $cc)
            ->with('cart', $cart)->with('coupons', $cupones);
    }
}
