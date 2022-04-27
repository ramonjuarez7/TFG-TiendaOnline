<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supercategory extends Model
{
    use HasFactory;

    public function midcategories(){
        return $this->hasMany('App\Models\Concretecategory');
    }

    public static function getCategories(){
        return $this->get()->toArray();
    }
}
