<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\Product;

class InicioController extends Controller
{
    public function about(){
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        return view('aboutus')->with('supercategories', $sc)->with('concretecategories', $cc);
    }

    public function contact(){
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        return view('contactus')->with('supercategories', $sc)->with('concretecategories', $cc);
    }

    public function search(Request $palabra){
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $products = Product::filterAndPaginate($palabra->get('buscar'));
        return view('search.search')->with('supercategories', $sc)->with('concretecategories', $cc)->with('products', $products)
            ->with('busqueda', $palabra->get('buscar'));
    }
}
