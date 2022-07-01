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

        //Aguas
        $product = new Product();
        $product->Nombre = "Agua Bezoya 1.5L";
        $product->Imagen = '/images/products/1.jpg';
        $product->Informacion = "Botella de agua Bezoya de 1.5 L";
        $product->Medicion = false;
        $product->Peso_volumen = 1.5;
        $product->Precio_individual = 0.69;
        $product->Precio_peso_volumen = 0.46;
        $product->Codigo_barras = 8410128000400;
        $product->concretecategory_id = 1;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();


        $product = new Product();
        $product->Nombre = "Agua Cabreiroá 1L";
        $product->Imagen = '/images/products/2.jpg';
        $product->Informacion = "Botella de agua Cabreiroá de 1L";
        $product->Medicion = false;
        $product->Peso_volumen = 1;
        $product->Precio_individual = 0.69;
        $product->Precio_peso_volumen = 0.69;
        $product->Codigo_barras = 8411902008117;
        $product->concretecategory_id = 1;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Agua Bezoya 0.5L";
        $product->Imagen = '/images/products/3.jpg';
        $product->Informacion = "Botella de agua Bezoya de 0.5 L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.5;
        $product->Precio_individual = 0.57;
        $product->Precio_peso_volumen = 1.14;
        $product->Codigo_barras = 8410128160319;
        $product->concretecategory_id = 1;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Agua Solán Cabras 0.5L";
        $product->Imagen = '/images/products/4.jpg';
        $product->Informacion = "Botella de agua Solán de Cabras de 0.5 L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.5;
        $product->Precio_individual = 0.66;
        $product->Precio_peso_volumen = 1.32;
        $product->Codigo_barras = 8411547001061;
        $product->concretecategory_id = 1;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Agua Font Vella 6.25L";
        $product->Imagen = '/images/products/5.jpg';
        $product->Informacion = "Garrafa de agua Font Vella de 6.25L";
        $product->Medicion = false;
        $product->Peso_volumen = 6.25;
        $product->Precio_individual = 2.15;
        $product->Precio_peso_volumen = 0.34;
        $product->Codigo_barras = 8410055501131;
        $product->concretecategory_id = 1;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Agua Benassal 5L";
        $product->Imagen = '/images/products/6.jpg';
        $product->Informacion = "Garrafa de agua Benassal de 5L";
        $product->Medicion = false;
        $product->Peso_volumen = 5;
        $product->Precio_individual = 2.83;
        $product->Precio_peso_volumen = 0.37;
        $product->Codigo_barras = 8424553234569;
        $product->concretecategory_id = 1;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        $product = new Product();
        $product->Nombre = "Agua con gas Vichy Catalán 1L";
        $product->Imagen = '/images/products/7.jpg';
        $product->Informacion = "Botella de cristal de agua con gas Vichy Catalán de 1L";
        $product->Medicion = false;
        $product->Peso_volumen = 1;
        $product->Precio_individual = 1.18;
        $product->Precio_peso_volumen = 1.18;
        $product->Codigo_barras = 8410749001107;
        $product->concretecategory_id = 1;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        $product = new Product();
        $product->Nombre = "Agua Aquarel 5L";
        $product->Imagen = '/images/products/8.jpg';
        $product->Informacion = "Garrafa de agua Aquarel de 5L";
        $product->Medicion = false;
        $product->Peso_volumen = 5;
        $product->Precio_individual = 1.45;
        $product->Precio_peso_volumen = 0.29;
        $product->Codigo_barras = 3700123300175;
        $product->concretecategory_id = 1;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Agua con gas Solán Cabras 0.75L";
        $product->Imagen = '/images/products/9.jpg';
        $product->Informacion = "Botella de agua con gas Solán de Cabras de 0.75L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.75;
        $product->Precio_individual = 1.29;
        $product->Precio_peso_volumen = 1.72;
        $product->Codigo_barras = 8411547212740;
        $product->concretecategory_id = 1;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        //Refrescos
        $product = new Product();
        $product->Nombre = "Refresco Fanta Naranja 0.33L";
        $product->Imagen = '/images/products/10.jpg';
        $product->Informacion = "Lata de refresco Fanta sabor Naranja de 0.33L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.33;
        $product->Precio_individual = 0.50;
        $product->Precio_peso_volumen = 1.52;
        $product->Codigo_barras = 5449000011527;
        $product->concretecategory_id = 2;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Refresco Fanta Limón 0.33L";
        $product->Imagen = '/images/products/11.jpg';
        $product->Informacion = "Lata de refresco Fanta sabor Limón de 0.33L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.33;
        $product->Precio_individual = 0.50;
        $product->Precio_peso_volumen = 1.52;
        $product->Codigo_barras = 5449000006004;
        $product->concretecategory_id = 2;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Refresco Fanta Limón ZERO 0.33L";
        $product->Imagen = '/images/products/12.jpg';
        $product->Informacion = "Lata de refresco Fanta sabor Limón de 0.33L con 0 azúcares añadidos";
        $product->Medicion = false;
        $product->Peso_volumen = 0.33;
        $product->Precio_individual = 0.50;
        $product->Precio_peso_volumen = 1.52;
        $product->Codigo_barras = 5449000120991;
        $product->concretecategory_id = 2;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Refresco 7up Limón 0.33L";
        $product->Imagen = '/images/products/13.jpg';
        $product->Informacion = "Lata de refresco 7up sabor Lima Limón de 0.33L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.33;
        $product->Precio_individual = 0.45;
        $product->Precio_peso_volumen = 1.37;
        $product->Codigo_barras = 8410494300067;
        $product->concretecategory_id = 2;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        $product = new Product();
        $product->Nombre = "Refresco Coca-Cola ZERO 0.33L";
        $product->Imagen = '/images/products/14.jpg';
        $product->Informacion = "Lata de refresco Coca-Cola de 0.33L con 0 azúcares añadidos";
        $product->Medicion = false;
        $product->Peso_volumen = 0.33;
        $product->Precio_individual = 0.78;
        $product->Precio_peso_volumen = 2.36;
        $product->Codigo_barras = 5449000131805;
        $product->concretecategory_id = 2;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        //Licores
        $product = new Product();
        $product->Nombre = "Whiskey Tennessee Jack Daniel's";
        $product->Imagen = '/images/products/15.jpg';
        $product->Informacion = "Botella de Whiskey Jack Daniel's de 0.70L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.7;
        $product->Precio_individual = 21.49;
        $product->Precio_peso_volumen = 30.70;
        $product->Codigo_barras = 5099873090473;
        $product->concretecategory_id = 3;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        $product = new Product();
        $product->Nombre = "Vodka Smirnoff";
        $product->Imagen = '/images/products/16.jpg';
        $product->Informacion = "Botella de Vodka Smirnoff de 1L";
        $product->Medicion = false;
        $product->Peso_volumen = 1;
        $product->Precio_individual = 13.49;
        $product->Precio_peso_volumen = 13.49;
        $product->Codigo_barras = 5410316100373;
        $product->concretecategory_id = 3;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Ginebra Beefeater";
        $product->Imagen = '/images/products/17.jpg';
        $product->Informacion = "Botella de Ginebra Beefeater de 0.7L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.70;
        $product->Precio_individual = 13.00;
        $product->Precio_peso_volumen = 18.57;
        $product->Codigo_barras = 5000299618738;
        $product->concretecategory_id = 3;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Ron Negrita";
        $product->Imagen = '/images/products/18.jpg';
        $product->Informacion = "Botella de Ron Negrita de 0.7L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.70;
        $product->Precio_individual = 8.40;
        $product->Precio_peso_volumen = 12.00;
        $product->Codigo_barras = 8410490001043;
        $product->concretecategory_id = 3;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        //Infusiones
        $product = new Product();
        $product->Nombre = "Manzanilla 25 Bolsitas";
        $product->Imagen = '/images/products/19.jpg';
        $product->Informacion = "25 Bolsitas de infusión de manzanilla de Pompadour";
        $product->Medicion = true;
        $product->Peso_volumen = 0.25;
        $product->Precio_individual = 1.90;
        $product->Precio_peso_volumen = 0.08;
        $product->Codigo_barras = 4009300501152;
        $product->concretecategory_id = 4;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Té Verde 25 Bolsitas";
        $product->Imagen = '/images/products/20.jpg';
        $product->Informacion = "25 Bolsitas de infusión de Té Verde de Tetley";
        $product->Medicion = true;
        $product->Peso_volumen = 0.25;
        $product->Precio_individual = 2.29;
        $product->Precio_peso_volumen = 0.09;
        $product->Codigo_barras = 5000208050987;
        $product->concretecategory_id = 4;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        //Isotónicas
        $product = new Product();
        $product->Nombre = "Aquarius Naranja 0.33L";
        $product->Imagen = '/images/products/21.jpg';
        $product->Informacion = "Lata de bebida isotónica Aquarius sabor naranja de 0.33L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.33;
        $product->Precio_individual = 0.79;
        $product->Precio_peso_volumen = 2.39;
        $product->Codigo_barras = 5449000033819;
        $product->concretecategory_id = 5;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        $product = new Product();
        $product->Nombre = "Aquarius Limón 0.33L";
        $product->Imagen = '/images/products/22.jpg';
        $product->Informacion = "Lata de bebida isotónica Aquarius sabor Limón de 0.33L";
        $product->Medicion = false;
        $product->Peso_volumen = 0.33;
        $product->Precio_individual = 0.79;
        $product->Precio_peso_volumen = 2.39;
        $product->Codigo_barras = 5449000058560;
        $product->concretecategory_id = 5;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        //Energéticas
        $product = new Product();
        $product->Nombre = "Monster Green 0.5L";
        $product->Imagen = '/images/products/23.jpg';
        $product->Informacion = "Lata de bebida energética Monster Green de 0.50L";
        $product->Medicion = true;
        $product->Peso_volumen = 0.5;
        $product->Precio_individual = 1.19;
        $product->Precio_peso_volumen = 2.38;
        $product->Codigo_barras = 5060166690380;
        $product->concretecategory_id = 6;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Red Bull 0.25L";
        $product->Imagen = '/images/products/24.jpg';
        $product->Informacion = "Lata de bebida energética Red Bull de 0.25L";
        $product->Medicion = true;
        $product->Peso_volumen = 0.25;
        $product->Precio_individual = 1.19;
        $product->Precio_peso_volumen = 4.76;
        $product->Codigo_barras = 9002490222673;
        $product->concretecategory_id = 6;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        //Cervezas
        $product = new Product();
        $product->Nombre = "Mahou Clásica 0.33L";
        $product->Imagen = '/images/products/25.jpg';
        $product->Informacion = "Lata de cerveza Mahou de 0.33L";
        $product->Medicion = true;
        $product->Peso_volumen = 0.33;
        $product->Precio_individual = 0.61;
        $product->Precio_peso_volumen = 1.85;
        $product->Codigo_barras = 8411327022019;
        $product->concretecategory_id = 7;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Cerveza Budweiser 0.33L";
        $product->Imagen = '/images/products/26.jpg';
        $product->Informacion = "Lata de cerveza Americana Budweiser de 0.33L";
        $product->Medicion = true;
        $product->Peso_volumen = 0.33;
        $product->Precio_individual = 0.61;
        $product->Precio_peso_volumen = 1.79;
        $product->Codigo_barras = 5014379003161;
        $product->concretecategory_id = 7;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        $product = new Product();
        $product->Nombre = "Cerveza Franziskaner 0.50L";
        $product->Imagen = '/images/products/27.jpg';
        $product->Informacion = "Botellín de cerveza de trigo Alemana Franziskaner de 0.50L";
        $product->Medicion = true;
        $product->Peso_volumen = 0.5;
        $product->Precio_individual = 1.55;
        $product->Precio_peso_volumen = 3.10;
        $product->Codigo_barras = 4072700003649;
        $product->concretecategory_id = 7;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        //Vinos
        $product = new Product();
        $product->Nombre = "Vino Blanco Verdejo 0.75L";
        $product->Imagen = '/images/products/28.jpg';
        $product->Informacion = "Botella de vino blanco Verdejo D.O. Rueda de 0.75L";
        $product->Medicion = true;
        $product->Peso_volumen = 0.75;
        $product->Precio_individual = 2.15;
        $product->Precio_peso_volumen = 2.87;
        $product->Codigo_barras = 8410261204062;
        $product->concretecategory_id = 8;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        //Vinos
        $product = new Product();
        $product->Nombre = "Vino Blanco Don Simón 1L";
        $product->Imagen = '/images/products/29.jpg';
        $product->Informacion = "Brik de vino blanco Don Simón de 1L";
        $product->Medicion = true;
        $product->Peso_volumen = 1;
        $product->Precio_individual = 1.60;
        $product->Precio_peso_volumen = 1.60;
        $product->Codigo_barras = 8410261273105;
        $product->concretecategory_id = 8;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Vino Tinto Don Simón 1L";
        $product->Imagen = '/images/products/30.jpg';
        $product->Informacion = "Brik de vino Tinto Don Simón de 1L";
        $product->Medicion = true;
        $product->Peso_volumen = 1;
        $product->Precio_individual = 1.60;
        $product->Precio_peso_volumen = 1.60;
        $product->Codigo_barras = 8410261271019;
        $product->concretecategory_id = 8;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();

        $product = new Product();
        $product->Nombre = "Vino Tinto Cune Rioja 0.75L";
        $product->Imagen = '/images/products/31.jpg';
        $product->Informacion = "Botella de vino tinto Cune Crianza D.O. Rioja de 0.75L";
        $product->Medicion = true;
        $product->Peso_volumen = 0.75;
        $product->Precio_individual = 6.75;
        $product->Precio_peso_volumen = 9;
        $product->Codigo_barras = 8410591002413;
        $product->concretecategory_id = 8;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        $product = new Product();
        $product->Nombre = "Vino Rosado Mq.Cáceres 0.75L";
        $product->Imagen = '/images/products/32.jpg';
        $product->Informacion = "Botella de vino rosado Marqués de Cáceres D.O. Rioja de 0.75L";
        $product->Medicion = true;
        $product->Peso_volumen = 0.75;
        $product->Precio_individual = 4.65;
        $product->Precio_peso_volumen = 6.20;
        $product->Codigo_barras = 8410406611007;
        $product->concretecategory_id = 8;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = true;
        $product->save();

        //zumos
        $product = new Product();
        $product->Nombre = "Zumo Naranja con pulpa 1L";
        $product->Imagen = '/images/products/33.jpg';
        $product->Informacion = "Brik de zumode naranja con pulpa DDon Simón de 1L";
        $product->Medicion = true;
        $product->Peso_volumen = 1;
        $product->Precio_individual = 1.65;
        $product->Precio_peso_volumen = 1.65;
        $product->Codigo_barras = 8410261608105;
        $product->concretecategory_id = 9;
        $product->Stock=1000;
        $product->Maximo_pedido=30;
        $product->Novedad = false;
        $product->save();


    }
}
