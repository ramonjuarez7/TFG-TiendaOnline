<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supercategory;
use App\Models\Concretecategory;
use App\Models\User;
use App\Mail\RegistroCompleto;
use Illuminate\Support\Facades\Mail;

use ShoppingCart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function loginIndex(){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();
        $e = false;
        return view('auth.login')->with('credentialerror', $e)->with('supercategories', $sc)->with('concretecategories', $cc)->with('cart', $cart);
    }

    public function loginPost(Request $request){
        $cart = ShoppingCart::all();
        $sc = Supercategory::All();
        $cc = Concretecategory::All();

        $usuario_exist = \DB::table('users')
            ->where('Email', '=',$request->email)
            ->where('Password','=',$request->passwd)  
            ->exists();


        if($usuario_exist){
            $usuario = User::where('Email',$request->email)
                ->where('Password',$request->passwd)    
                ->firstOrFail();

            Auth::login($usuario);
            return redirect('/Perfil');  
        }else{
            $e = true;
            return view('auth.login')->with('credentialerror', $e)->with('supercategories', $sc)
                ->with('concretecategories', $cc)->with('cart', $cart);;
        }
    }

    public function logout(Request $request)
    {
        $cart = ShoppingCart::All();
        foreach($cart as $it){
            $temp = "";
            $temp = $temp . $it->id;
            $prod = Product::findOrFail($temp);
            $prod->save();
        }
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
}
