<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Mail\RegistroCompleto;

use ShoppingCart;

class OrderController extends Controller
{
    public function index(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();

        $email = \Auth::user()->Email;
        $usuario = User::where('Email',$email)->firstOrFail();
        $pedidos = \DB::select('SELECT * FROM orders where user_id = '.$usuario->id);
        $productos = Product::All();
        $orderprod = \DB::select('SELECT * FROM order_product');

        $productosenpedido;
        
        return view('orders.index')->with('usuario', $usuario)->with('supercategories', $sc)
        ->with('concretecategories', $cc)->with('cart', $cart)->with('orders',$pedidos)
        ->with('products', $productos)->with('orderprod', $orderprod);
    }

}
