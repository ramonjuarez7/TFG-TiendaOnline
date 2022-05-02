<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\ServiceLayer\Services;

use Redirect;
use ShoppingCart;
use Auth;

class CarritoController extends Controller
{
    //
    

    public function index(){
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $cart = ShoppingCart::All();
        $productos = array();
        foreach($cart as $pedidoproducto){
            $producto = Product::findOrFail($pedidoproducto->id);

            array_push($productos, $producto, $pedidoproducto->id);
        }

        return view('carrito.carrito')->with('cart', $cart)->with('productos', $productos)
        ->with('supercategories', $sc)->with('concretecategories', $cc);
    }

    public function eliminarCarrito(){
        ShoppingCart::destroy();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $cart = ShoppingCart::All();
        $productos = array();
        foreach($cart as $pedidoproducto){
            $producto = Product::findOrFail($pedidoproducto->id);

            array_push($productos, $producto, $pedidoproducto->id);
        }
        return Redirect::to('/Carrito')->with('cart', $cart)->with('productos', $productos)
        ->with('supercategories', $sc)->with('concretecategories', $cc);
    }

    public function delete($rawId){
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $item = ShoppingCart::get($rawId);
        $prod = Product::findOrFail($item->id);
        $prod->save();

        if(\Auth::guest()){
            ShoppingCart::update($rawId, $item->qty-1, ['Descuento' => 0]);
        } else {
            $email = \Auth::user()->Email;
            $usuario = \App\Models\User::where('Email',$email)->firstOrFail();
            $descuentototal = Product::descuentoTotal($item->id, $item->qty-1, $usuario);
            ShoppingCart::update($rawId, $item->qty-1, ['Descuento' => $descuentototal]);
        }
                
        $cart = ShoppingCart::All();

        $productos = array();
        foreach($cart as $pedidoproducto){
            $producto = Product::findOrFail($pedidoproducto->id);
            
            array_push($productos, $producto, $pedidoproducto->id);
        }

        
        return Redirect::to('/Carrito')->with('cart', $cart)->with('productos', $productos)
        ->with('supercategories', $sc)->with('concretecategories', $cc);
    }

    public function add($rawId){
        $carrito = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $item = ShoppingCart::get($rawId);
        $prod = Product::findOrFail($item->id);
        
        if(\Auth::guest()){
            ShoppingCart::update($rawId, $item->qty+1, ['Descuento' => 0]);
        } else {
            $email = \Auth::user()->Email;
            $usuario = \App\Models\User::where('Email',$email)->firstOrFail();
            $descuentototal = Product::descuentoTotal($item->id, $item->qty+1, $usuario);
            ShoppingCart::update($rawId, $item->qty+1, ['Descuento' => $descuentototal]);
        }

        $cart = ShoppingCart::All();
        $productos = array();

        foreach($cart as $pedidoproducto){
            $producto = Product::findOrFail($pedidoproducto->id);

            array_push($productos, $producto, $pedidoproducto->id);
        }

        
        return redirect('Carrito')->with('cart', $cart)->with('productos', $productos)
        ->with('supercategories', $sc)->with('concretecategories', $cc);
    }

    public function finish(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        if(!Auth::user()) return redirect('login');
        return redirect('Pedido/Finalizar')->with('supercategories', $sc)
        ->with('concretecategories', $cc)->with('cart', $cart);
    }

    /*
    public static function processOrder($tarj, $Pedido, $dir) {
        
        $rollback = false;
        \DB::beginTransaction();

        $id = Auth::user()->id;
        $user = Usuario::findOrFail($id);

        $Pedido->usuario = $user->email;
        $Pedido->save();

        $Pedido->direccion = $dir->id;

        $cart = ShoppingCart::All();
        foreach ($cart as $item) {
            $product = Producto::findOrFail($item->id);
            
            $product->popularidad += $item->qty;
            
            $Pedido->precio += $item->total;
            $Pedido->estado = 'Preparando';
            $Pedido->tarjeta = $tarj->numero;
            $Pedido->productos()->attach($product, ['cantidad' => $item->qty]);
        }
        
        if ($rollback) {
            DB::rollBack();
            return false;
        }

        DB::commit();
        return true;
    }*/

}
