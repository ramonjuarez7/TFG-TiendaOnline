<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concretecategory extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function midcategory(){
        return $this->belongsTo('App\Supercategory');
    }
}
