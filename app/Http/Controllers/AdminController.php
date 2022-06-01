<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\Coupon;
use App\ServiceLayer\Services;

use Redirect;
use ShoppingCart;
use Auth;

class AdminController extends Controller
{
    public function index(){
        /*
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $cart = ShoppingCart::All();

        return view('admin.index')->with('cart', $cart)->with('supercategories', $sc)->with('concretecategories', $cc);*/
        return Redirect::to('Administracion/Productos');
    }
    
    public function categoria($cat){
        return Redirect::to('Administracion/'.$cat.'/Id');
    }


    public function filtro($cat,$filtro){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        switch($cat){
            case "Usuarios":
                $modelo = User::All()->sortBy($filtro);
                break;
            case "Productos":
                $modelo = Product::All()->sortBy($filtro);
                break;
            case "Categorias":
                $modelo = Supercategory::All()->sortBy($filtro);
                break;
            case "Subcategorias":
                $modelo = Concretecategory::All()->sortBy($filtro);
                break;
            case "Cupones":
                $modelo = Coupon::All()->sortBy($filtro);
                break;
        }
        
        return view('admin.index')->with('supercategories', $sc)->with('concretecategories', $cc)
            ->with('cart', $cart)->with('pest',$cat)->with('modelo', $modelo);
    }

    public function detalles($cat,$id){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        return view('admin.info')->with('supercategories', $sc)->with('concretecategories', $cc)
        ->with('cart', $cart)->with('element',$id)->with('pest',$cat);
    }

    public function modificar($cat, $id, Request $request){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();

        switch($cat){
            case "Productos":
                $request->validate([
                    'tar1' => 'nullable|max:200',
                    'tar2' => 'nullable|max:200',
                    'tar3' => 'nullable|max:9',
                    'tar4' => 'nullable|numeric',
                    'tar5' => 'nullable|numeric',
                    'tar6' => 'nullable|numeric',
                    'tar7' => 'nullable|numeric',
                ]);
                $prod = \App\Models\Product::findOrFail($id);
                if($request->tar1 != null){
                    $prod->Nombre = $request->tar1;
                }
                if($request->tar2 != null){
                    $prod->Informacion = $request->tar2;
                }
                if($request->tar3 != null){
                    $prod->Peso_volumen = $request->tar3;
                }
                if($request->tar4 != null){
                    $prod->Precio_individual = $request->tar4;
                }
                if($request->tar5 != null){
                    $prod->Precio_peso_volumen = $request->tar5;
                }
                if($request->tar6 != null){
                    $prod->Stock = $request->tar6;
                }
                if($request->tar7 != null){
                    $prod->Maximo_pedido = $request->tar7;
                }
                $prod->Medicion = ($request->medicion == "option2");
                $prod->Novedad = ($request->novedad == "option3");
                if($request->get('cat') != 0){
                    $prod->concretecategory_id = $request->get('cat');
                }
                $prod->save();
                break;
            case "Usuarios":
                $request->validate([
                    'tar1' => 'nullable|max:200',
                    'tar2' => 'nullable|max:200',
                    'tar3' => 'nullable|max:9',
                    'tar4' => 'nullable|email:rfc,dns|unique:users,email',
                    'tar5' => 'nullable|max:10',
                    'tar6' => 'nullable|numeric|digits:9|unique:users,telefono',
                    'tar7' => 'nullable|max:200',
                    'tar7' => 'nullable|max:200',
                ]);
                $prod = \App\Models\User::findOrFail($id);
                if($request->tar1 != null){
                    $prod->Nombre = $request->tar1;
                }
                if($request->tar2 != null){
                    $prod->Apellidos = $request->tar2;
                }
                if($request->tar3 != null){
                    $prod->DNI_NIF = $request->tar3;
                }
                if($request->tar4 != null){
                    $prod->Email = $request->tar4;
                }
                if($request->tar5 != null){
                    $prod->Nacimiento = $request->tar5;
                }
                if($request->tar6 != null){
                    $prod->Telefono = $request->tar6;
                }
                if($request->tar7 != null){
                    $prod->Direccion_envio = $request->tar7;
                }
                if($request->tar7 != null){
                    $prod->Direccion_facturacion = $request->tar7;
                }
                $email = \Auth::user()->Email;
                $usuario = \App\Models\User::where('Email',$email)->firstOrFail(); 
                if($prod->id != $usuario->id){
                    $prod->Estado = ($request->novedad == "option3");
                    $prod->Privilegios = ($request->medicion == "option1");
                }
                $prod->save();
                break;
            case "Categorias":
                $request->validate([
                    'tar1' => 'nullable|max:200',
                ]);
                $prod = \App\Models\Supercategory::findOrFail($id);
                if($request->tar1 != null){
                    $prod->Nombre = $request->tar1;
                }
                $prod->save();
                break;
            case "Subcategorias":
                $request->validate([
                    'tar1' => 'nullable|max:200',
                ]);
                $prod = \App\Models\Concretecategory::findOrFail($id);
                if($request->tar1 != null){
                    $prod->Nombre = $request->tar1;
                }
                if($request->get('cat') != 0){
                    $prod->supercategory_id = $request->get('cat');
                }
                $prod->save();
                break;
            case "Cupones":
                $request->validate([
                    'tar1' => 'nullable|numeric',
                ]);
                $prod = \App\Models\Coupon::findOrFail($id);
                if($request->tar1 != null){
                    $prod->Descuento = $request->tar1;
                }
                if($request->get('cat') != 0){
                    $prod->product_id = $request->get('cat');
                }
                $prod->save();
                break;
        }
        return redirect('Administracion/'.$cat.'/Elemento/'.$id)->withErrors(['Modificacion exitosa.']);

    }

    public function borrar($cat,$id){
        switch($cat){
            case "Productos":
                $e = \App\Models\Product::findOrFail($id);
                $cart = ShoppingCart::all();
                foreach($cart as $item){
                    if($item->id == $id){
                        ShoppingCart::remove($item->rawId());
                    }
                }
                $e->delete();
                break;
            case "Usuarios":
                $e = \App\Models\User::findOrFail($id);
                $e->delete();
                break;
            case "Categorias":
                $e = \App\Models\Supercategory::findOrFail($id);
                $e->delete();
                break;
            case "Subcategorias":
                $e = \App\Models\Concretecategory::findOrFail($id);
                $e->delete();
                break;
            case "Cupones":
                $e = \App\Models\Coupon::findOrFail($id);
                $e->delete();
                break;
        }
        
        return redirect('Administracion/'.$cat);
    }

    public function addCoupon($cat, $id, Request $request){
        $request->validate([
            'tar2' => 'required|numeric',
        ]);
        if($request->get('user') != 0){
            $coupon = \App\Models\Coupon::findOrFail($id);
            $coupon->users()->detach($request->get('user'));
            $coupon->users()->attach($request->get('user'), ['Cantidad' => $request->tar2]);
            return redirect('Administracion/'.$cat.'/Elemento/'.$id)->withErrors(['Cupones agregados correctamente.']);
        } else {
            return redirect('Administracion/'.$cat.'/Elemento/'.$id);
        }
        
    }

}
