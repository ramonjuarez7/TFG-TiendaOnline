<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Coupon;

use ShoppingCart;

class Order extends Model
{
    use HasFactory;

    public $Lineas;

    public function __construct(){
        $Lineas = 0;
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function products(){
        return $this->belongsToMany('App\Models\Product');
    }

    public function addProduct($prod, $qty, $desc){
        $this->Lineas += 1;
        $prod->orders()->attach($this->id, ['Cantidad' => $qty, 'Linea' => $this->Lineas, 'Precio' => $prod->Precio_individual, 'Descuento' => $desc]);
    }

    public function calcularTotal(){
        $total = 0;
        $productos = \DB::select('SELECT * FROM order_product WHERE order_id ="'.$this->id.'"');
        foreach($productos as $prod){
            $p = Product::findOrFail($prod->product_id);
            $total += $p->Precio_individual * $prod->Cantidad;
        }
        return $total;
    }

    public static function actualizarDescuentosCarritoLogin($usuario){
        $cart = ShoppingCart::All();
        $coupons = \DB::select('SELECT * FROM coupon_user WHERE user_id ='.$usuario->id);
        foreach($cart as $item){
            foreach($coupons as $coup){
                $c = Coupon::findOrFail($coup->coupon_id);
                if($item->id == $c->product_id){
                    if($item->qty < $coup->Cantidad){
                        $desctotal = $c->Descuento * $item->qty;
                    } else {
                        $desctotal = $c->Descuento * $coup->Cantidad;
                    }
                    
                    ShoppingCart::update($item->rawId(),['Descuento' => $desctotal]);
                }
            }  
        }
    }

    public static function processOrder($Pedido) {
        
        $rollback = false;
        \DB::beginTransaction();

        $id = \Auth::user()->id;
        $user = \App\Models\User::findOrFail($id);

        $Pedido->user_id = $user->id;
        

        $cart = ShoppingCart::All();
        $Pedido->Precio_total = 0;
        $Pedido->save();
        foreach ($cart as $item) {
            $product = \App\Models\Product::findOrFail($item->id);
            
            $Pedido->Precio_total += $item->total - $item->Descuento;
            $Pedido->Pagado = false;
            $Pedido->Entregado = false;
            //$Pedido->Fecha = \Carbon::now();
            $Pedido->addProduct($product, $item->qty, $item->Descuento);
        }
        
        if ($rollback) {
            \DB::rollBack();
            return false;
        }

        \DB::commit();
        return true;
    }

}
