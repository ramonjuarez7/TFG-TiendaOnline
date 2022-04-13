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
        return Product::Nombre($nombre)->orderBy('id','DESC')->paginate(12);
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

    public function concretecategory(){
        return $this->belongsTo('App\Concretecategory');
    }

    public function coupons(){
        return $this->hasMany('App\Coupons');
    }
}
