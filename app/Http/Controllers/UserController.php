<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\User;
use App\Models\Order;
use App\Mail\RegistroCompleto;
use Illuminate\Support\Facades\Mail;

use ShoppingCart;


class UserController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function perfil(){
        return redirect('/Perfil/Cuenta');
    }

    public function datos(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $pestanya = "Datos";

        $email = \Auth::user()->Email;

        $usuario = User::where('Email',$email)->firstOrFail();

        return view('user.perfil')->with('usuario', $usuario)
        ->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart)->with('pest',$pestanya);
    }

    public function cuenta(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $pestanya = "Cuenta";

        $email = \Auth::user()->Email;

        $usuario = User::where('Email',$email)->firstOrFail();

        return view('user.perfil')->with('usuario', $usuario)
        ->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart)->with('pest',$pestanya);
    }

    public function direcciones(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $pestanya = "Direcciones";

        $email = \Auth::user()->Email;

        $usuario = User::where('Email',$email)->firstOrFail();

        return view('user.perfil')->with('usuario', $usuario)
        ->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart)->with('pest',$pestanya);
    }

    public function modificar($pest, $target){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $pestanya = "";
        $email = \Auth::user()->Email;

        $usuario = User::where('Email',$email)->firstOrFail();
        $pedidos = Order::where('user_id', $usuario->id)->get();

        return view('user.modificar')->with('usuario', $usuario)
        ->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart)
        ->with('target',$target);
    }

    public function modificarPost($pest, $target, Request $request){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $pestanya = "";
        $email = \Auth::user()->Email;

        $usuario = User::where('Email',$email)->firstOrFail();

        if($usuario->Password == $request->passwd){
            switch($target){
                case "Telefono":
                    $request->validate([
                        'tar' => 'numeric|required|digits:9|unique:users,telefono',
                    ]);
                    $usuario->Telefono = $request->tar;
                    break;
                case "Envio":
                    $request->validate([
                        'tar' => 'required|max:200',
                    ]);
                    $usuario->Direccion_envio = $request->tar;
                    break;
                case "Facturacion":
                    $request->validate([
                        'tar' => 'required|max:200',
                    ]);
                    $usuario->Direccion_facturacion = $request->tar;
                    break;
                case "Email":
                    $request->validate([
                        'tar' => 'required|email:rfc,dns|unique:users,email',
                    ]);
                    $usuario->Email = $request->tar;
                    break;
                case "Password":
                    $request->validate([
                        'tar' => 'required|confirmed|max:20',
                    ]);
                    $usuario->Password = $request->tar;
                    break;
            }
            $usuario->save();
            return redirect('Perfil/'. $pest)->withErrors(['Modificacion exitosa.']);
        } else {
            return redirect('Perfil/'. $pest .'/Modificar/' .$target)->withErrors(['Contraseña incorrecta.']);
        }
        

    }

    

    public function verUsuario($id){
        $usuario = Usuario::where('id',$id)->firstOrFail();
        $pedidos = Pedido::where('usuario', $usuario->email)->get();
        $direcciones = Direccion::where('usuario', $usuario->email)->get();
        $tarjetas = Tarjeta::where('usuario', $usuario->email)->get();

        return view('usuario.perfil')->with('usuario', $usuario)->with('pedidos', $pedidos)->with('direcciones', $direcciones)->with('tarjetas', $tarjetas); 
    }

    
}
