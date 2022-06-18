<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\Product;

use ShoppingCart;

class InicioController extends Controller
{

    public $scannedprods;

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

    public function leerCodigo(Request $request){

        $code_exists = \DB::table('products')
            ->where('Codigo_barras','=',$request->get('codigoEscaneado')) 
            ->exists();

        if($code_exists){
            $code = $request->get('codigoEscaneado');
            $prod = Product::where('Codigo_barras',$code)->firstOrFail();
            return redirect('Producto/'.$prod->id);
        }

        return redirect('/')->withErrors(['msg' => 'Código no encontrado']);
    }
}
