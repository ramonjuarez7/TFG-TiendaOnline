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

        for($i = 0; $i < 20; $i++){
            $product = new Product();
            $product->Nombre = "Agua Bezoya 1.5L";
            $product->Imagen = '/images/products/1.jpg';
            $product->Informacion = "Botella de agua Bezoya de 1.5 L";
            $product->Medicion = false;
            $product->Peso_volumen = 1.5;
            $product->Precio_individual = 0.69;
            $product->Precio_peso_volumen = 0.43;
            $product->Codigo_barras = 1+$i;
            $product->concretecategory_id = 1;
            $product->Stock=10;
            $product->Maximo_pedido=5;
            $product->Novedad = false;
            $product->save();
        }

        $product = new Product();
            $product->Nombre = "Agua Bezoya 2L";
            $product->Imagen = '/images/products/1.jpg';
            $product->Informacion = "Botella de agua Bezoya de 2 L";
            $product->Medicion = false;
            $product->Peso_volumen = 2;
            $product->Precio_individual = 0.86;
            $product->Precio_peso_volumen = 0.43;
            $product->Codigo_barras = 8989898;
            $product->concretecategory_id = 1;
            $product->Stock=10;
            $product->Maximo_pedido=5;
            $product->Novedad = true;
            $product->save();

            $product = new Product();
            $product->Nombre = "AbTomates";
            $product->Imagen = '/images/products/1.jpg';
            $product->Informacion = "Tomates";
            $product->Medicion = true;
            $product->Peso_volumen = 1;
            $product->Precio_individual = 0.23;
            $product->Precio_peso_volumen = 1.34;
            $product->Codigo_barras = 5454545;
            $product->concretecategory_id = 17;
            $product->Stock=12;
            $product->Maximo_pedido=5;
            $product->Novedad = true;
            $product->save();


    }
}
