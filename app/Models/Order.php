<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

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

    public function addProduct($prod, $qty){
        $descuento = 0;
        $this->Lineas += 1;
        $prod->orders()->attach($this->id, ['Cantidad' => $qty, 'Linea' => $this->Lineas, 'Precio' => $prod->Precio_individual, 'Descuento' => $descuento]);
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

}
