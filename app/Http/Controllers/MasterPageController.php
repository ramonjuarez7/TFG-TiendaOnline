<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;

class MasterPageController extends Controller
{
    //
    public function categorias(){

    }

    public function inicio(){
        $supercategories = Supercategory::All();
        $concretecategories = Concretecategory::All();
        return view('index')->with('supercategories', $supercategories)->with('concretecategories', $concretecategories);
    }
}
