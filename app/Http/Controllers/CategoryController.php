<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function inicio_concretecat($supercategory, $concretecategory){
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $ccobject = new Concretecategory();
        $scobject = new Supercategory();
        
        $scid = -1;
        $ccid = -1;
        foreach($sc as $item){
            if($item->Nombre == $supercategory){
                $scid = $item->id;
                $scobject = Supercategory::FindOrFail($scid);
            }
        }

        if($scid != -1){
            foreach($cc as $item){
                if($item->Nombre == $concretecategory && $item->supercategory_id == $scid){
                    $ccid = $item->id;
                    $ccobject = Concretecategory::FindOrFail($ccid);
                }
            }
        } else {
            return view('error.error404');
        }

        if($ccid == -1){
            return view('error.error404');
        }

        $products = \DB::select('SELECT * FROM products where concretecategory_id ='.$ccid);

        //las dos categorias a las que se quiere acceder son correctas
        return view('categories.ccategory')->with('ccobject', $ccobject)->with('scobject', $scobject)
            ->with('supercategories', $sc)->with('concretecategories', $cc)->with('products', $products);
        
    }

    public function inicio_supercat($supercategory){
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $scobject = new Supercategory();
        
        $scid = -1;
        foreach($sc as $item){
            if($item->Nombre == $supercategory){
                $scid = $item->id;
                $scobject = Supercategory::FindOrFail($scid);
            }
        }

        if($scid == -1){
            return view('error.error404');
        }

        $products = \DB::select('SELECT * FROM products where concretecategory_id in 
            (SELECT id FROM concretecategories WHERE supercategory_id = '.$scid.')');

        //las dos categorias a las que se quiere acceder son correctas
        return view('categories.scategory')->with('scobject', $scobject)
            ->with('supercategories', $sc)->with('concretecategories', $cc)->with('products', $products);
    }

}
