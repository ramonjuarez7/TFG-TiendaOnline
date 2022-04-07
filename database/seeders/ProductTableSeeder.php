<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('products')->delete();

        for($i = 0; $i < 16; $i++){
            $product = new Product();
            $product->Nombre = "Agua Bezoya 1.5L";
            $product->Imagen = '/images/products/1.jpg';
            $product->Informacion = "Botella de agua Bezoya de 1.5 L";
            $product->Medicion = false;
            $product->Peso_volumen = 1.5;
            $product->Precio_individual = 0.69;
            $product->Precio_peso_volumen = 0.43;
            $product->Precio_pack = 3.54;
            $product->Unidades_pack = 6;
            $product->Codigo_barras = 1+$i;
            $product->concretecategory_id = 1;
            $product->save();
        }


    }
}
