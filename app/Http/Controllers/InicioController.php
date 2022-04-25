<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\Product;

use ShoppingCart;

class InicioController extends Controller
{
    public function about(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        return view('aboutus')->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart);
    }

    public function contact(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        return view('contactus')->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart);
    }

    public function search(Request $palabra){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $products = Product::filterAndPaginate($palabra->get('buscar'));
        return view('search.search')->with('supercategories', $sc)->with('concretecategories', $cc)->with('products', $products)
            ->with('busqueda', $palabra->get('buscar'))->with('cart', $cart);
    }
}
