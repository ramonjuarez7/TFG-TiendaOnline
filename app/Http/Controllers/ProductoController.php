<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\Product;

use ShoppingCart;
use Redirect;

class ProductoController extends Controller
{
    public function inicio($id){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $producto = Product::findOrFail($id);
        $concretcat = Concretecategory::findOrFail($producto->concretecategory_id);
        $supercat = Supercategory::findOrFail($concretcat->supercategory_id);
        return view('products.product')->with('supercategories', $sc)->with('concretecategories', $cc)
            ->with('producto', $producto)->with('ccat', $concretcat)->with('scat', $supercat)->with('cart', $cart);
    }

    public function addToCart($id, Request $cantidad){
        $producto = Product::findOrFail($id);
        $cart = ShoppingCart::all();

        if(\Auth::guest()){
            if($producto->Stock > 0){
                $cart = ShoppingCart::add($id, $producto->Nombre, $cantidad->get('cantidad') , $producto->Precio_individual, ['Descuento' => 0]);
                return Redirect::to('Carrito');
            }
            
        } else {
            $email = \Auth::user()->Email;
            $usuario = \App\Models\User::where('Email',$email)->firstOrFail();

            $descuentototal = Product::descuentoTotal($id, $cantidad->get('cantidad'), $usuario);

            if($producto->Stock > 0){
                $cart = ShoppingCart::add($id, $producto->Nombre, $cantidad->get('cantidad') , $producto->Precio_individual, ['Descuento' => $descuentototal]);
                return Redirect::to('Carrito');
            }
        }
            return Redirect::to('Producto/' . $id);
    }

    public function addToCartWithQuantity($id, $cantidad){
        $producto = Product::findOrFail($id);
        $cart = ShoppingCart::all();

        if(\Auth::guest()){
            if($producto->Stock > 0){
                $cart = ShoppingCart::add($id, $producto->Nombre, $cantidad , $producto->Precio_individual, ['Descuento' => 0]);
                return Redirect::to('Carrito');
            }
            
        } else {
            $email = \Auth::user()->Email;
            $usuario = \App\Models\User::where('Email',$email)->firstOrFail();

            $descuentototal = Product::descuentoTotal($id, $cantidad, $usuario);

            if($producto->Stock > 0){
                $cart = ShoppingCart::add($id, $producto->Nombre, $cantidad , $producto->Precio_individual, ['Descuento' => $descuentototal]);
                return Redirect::to('Carrito');
            }
        }
        return Redirect::to('Producto/' . $id);
    }

    
}

