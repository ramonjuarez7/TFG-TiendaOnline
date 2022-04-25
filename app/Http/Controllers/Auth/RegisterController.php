<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\User;
use App\Mail\RegistroCompleto;
use Illuminate\Support\Facades\Mail;

use ShoppingCart;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function useradd(Request $request){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();

        $request->validate([
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'nacimiento' => 'required|min:10|max:10',
            'dni' => 'required|min:9|max:9',
            'telefono' => 'required|numeric|digits:9|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'passwd' => 'required|confirmed|max:20',
            'envio' => 'required|max:200',
        ]);
        $usuario = new User();
        
        try{
            $usuario->Email = $request->email;
            $usuario->DNI_NIF = $request->dni;
            $usuario->Nombre = $request->nombre;
            $usuario->Apellidos = $request->apellidos;
            $usuario->Direccion_envio = $request->envio;
            if($request->facturacion == ""){
                $usuario->Direccion_facturacion = $request->envio;
            } else {
                $usuario->Direccion_facturacion = $request->facturacion;
            }
            
            $usuario->Nacimiento = $request->nacimiento;
            $usuario->Password = $request->passwd;
            $usuario->Telefono = $request->telefono;
            $usuario->Privilegios = false;
            $usuario->Registro = "06/04/2022";
            $usuario->save();

            Mail::to($usuario->Email)->send(new RegistroCompleto($usuario));     

        }catch(\Exception $e){
            return view('user.nocompleto')->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart);
        }

        return view('user.completo')->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart);

    }

    public function registro(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        return view('auth.register')->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart);
    }
}
