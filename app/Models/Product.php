<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    public function scopeNombre($query, $nombre)
    {
        if(trim($nombre))
            return $query->orWhere('Nombre', 'LIKE', "%$nombre%");
    }

    public static function filterAndPaginate($nombre){
        return Product::Nombre($nombre)->orderBy('id','DESC')->paginate(100);
    }

    public function orders(){
        return $this->belongsToMany('App\Models\Order');
    }

    public function concretecategory(){
        return $this->belongsTo('App\Models\Concretecategory');
    }

    public function coupons(){
        return $this->hasMany('App\Models\Coupon');
    }

    public static function descuentoTotal($id, $cantidad, $usuario){
        $usercup = \DB::select('SELECT * FROM coupon_user WHERE user_id ='.$usuario->id);
        $products = \App\Models\Product::All();
        $cup = \App\Models\Coupon::All();
        $descuento = 0;
        $valor = 0;
        foreach($usercup as $uc){ 
            foreach($cup as $c){
                if($c->id == $uc->coupon_id){
                    foreach($products as $p){
                        if($c->product_id == $id){
                            $descuento = $uc->Cantidad;
                            $valor = $c->Descuento;
                        } 
                    }
                } 
                
            }
        }         
        if($descuento > $cantidad){
            $cantidad = $cantidad;
        } else {
            $cantidad = $descuento;
        }

        return $valor * $descuento;
    }
}
