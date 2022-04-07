<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supercategory;

class SupercategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('supercategories')->delete();

        $category = new Supercategory();
        $category->Nombre = "Bebidas";
        $category->save();

        $category = new Supercategory();
        $category->Nombre = "Frescos";
        $category->save();

        $category = new Supercategory();
        $category->Nombre = "Despensa";
        $category->save();

        $category = new Supercategory();
        $category->Nombre = "Horno";
        $category->save();

        $category = new Supercategory();
        $category->Nombre = "Congelados";
        $category->save();

        $category = new Supercategory();
        $category->Nombre = "Limpieza";
        $category->save();

        $category = new Supercategory();
        $category->Nombre = "Cuidado personal";
        $category->save();

        $category = new Supercategory();
        $category->Nombre = "Mascotas";
        $category->save();

        $category = new Supercategory();
        $category->Nombre = "Infantil";
        $category->save();

    }
}
