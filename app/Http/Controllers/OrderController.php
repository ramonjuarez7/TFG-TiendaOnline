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

    public function pagado($id){
        $order = Order::findOrFail($id);
        $order->Pagado = true;
        $order->save();

        return Redirect('Pedidos');
    }

    public function finalizar(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();

        return view('orders.finalizar')->with('supercategories', $sc)
            ->with('concretecategories', $cc)->with('cart', $cart);
    }

    public function finish(Request $request){
        
        $Pedido = new Order();

        if(Order::processOrder($Pedido) === null){
            $Pedido->delete();
            dd('Problema interno');
            // llevar a página de error
        }

        $Pedido->save();
        ShoppingCart::clean();
        return Redirect('Pedidos');
    }

    public function anular($id){
        $email = \Auth::user()->Email;
        $usuario = User::where('Email',$email)->firstOrFail();

        $order = Order::findOrFail($id);

        if($usuario->id == $order->user_id){
            $order->delete();
            return Redirect('Pedidos');
        } else {
            return view('errors.error404');
        }


    }

}
