<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pago($id){
        $cart = \ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $order = Order::findOrFail($id);

        return view('payment')->with('supercategories', $sc)
        ->with('concretecategories', $cc)->with('cart', $cart)->with('order', $order);
    }
}
