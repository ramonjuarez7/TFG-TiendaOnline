<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Concretecategory;
use App\Models\Supercategory;

class ConcretecategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('concretecategories')->delete();

        //Bebidas 1
        $category = new Concretecategory();
        $category->Nombre = "Aguas";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Refrescos";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Licores";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Infusiones";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Isotónicas";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Energéticas";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Cervezas";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Vinos blancos";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Vinos rosados";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Vinos tintos";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Zumos";
        Supercategory::FindOrFail(1);
        $category->supercategory_id = 1;
        $category->save();

        //Frescos 2
        $category = new Concretecategory();
        $category->Nombre = "Carnes";
        Supercategory::FindOrFail(2);
        $category->supercategory_id = 2;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Charcutería";
        Supercategory::FindOrFail(2);
        $category->supercategory_id = 2;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Quesos";
        Supercategory::FindOrFail(2);
        $category->supercategory_id = 2;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Pescados";
        Supercategory::FindOrFail(2);
        $category->supercategory_id = 2;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Frutas";
        Supercategory::FindOrFail(2);
        $category->supercategory_id = 2;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Verduras";
        Supercategory::FindOrFail(2);
        $category->supercategory_id = 2;
        $category->save();

        //Despensa 3
        $category = new Concretecategory();
        $category->Nombre = "Aperitivos";
        Supercategory::FindOrFail(3);
        $category->supercategory_id = 3;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Frutos secos";
        Supercategory::FindOrFail(3);
        $category->supercategory_id = 3;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Caldos";
        Supercategory::FindOrFail(3);
        $category->supercategory_id = 3;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Sopas";
        Supercategory::FindOrFail(3);
        $category->supercategory_id = 3;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Conservar";
        Supercategory::FindOrFail(3);
        $category->supercategory_id = 3;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Desayunos";
        Supercategory::FindOrFail(3);
        $category->supercategory_id = 3;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Cafés";
        Supercategory::FindOrFail(3);
        $category->supercategory_id = 3;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Lácteos";
        Supercategory::FindOrFail(3);
        $category->supercategory_id = 3;
        $category->save();

        //Horno 4
        $category = new Concretecategory();
        $category->Nombre = "Pan";
        Supercategory::FindOrFail(4);
        $category->supercategory_id = 4;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Bollería";
        Supercategory::FindOrFail(4);
        $category->supercategory_id = 4;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Pastelería";
        Supercategory::FindOrFail(4);
        $category->supercategory_id = 4;
        $category->save();

        //Congelados 5
        $category = new Concretecategory();
        $category->Nombre = "Carnes";
        Supercategory::FindOrFail(5);
        $category->supercategory_id = 5;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Pescados";
        Supercategory::FindOrFail(5);
        $category->supercategory_id = 5;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Verduras";
        Supercategory::FindOrFail(5);
        $category->supercategory_id = 5;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Helados";
        Supercategory::FindOrFail(5);
        $category->supercategory_id = 5;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Preparados";
        Supercategory::FindOrFail(5);
        $category->supercategory_id = 5;
        $category->save();

        //Limpieza 6
        $category = new Concretecategory();
        $category->Nombre = "Detergentes";
        Supercategory::FindOrFail(6);
        $category->supercategory_id = 6;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Suavizantes";
        Supercategory::FindOrFail(6);
        $category->supercategory_id = 6;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Para el hogar";
        Supercategory::FindOrFail(6);
        $category->supercategory_id = 6;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Celulosa";
        Supercategory::FindOrFail(6);
        $category->supercategory_id = 6;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Accesorios";
        Supercategory::FindOrFail(6);
        $category->supercategory_id = 6;
        $category->save();

        //Cuidado personal 7
        $category = new Concretecategory();
        $category->Nombre = "Perfumes";
        Supercategory::FindOrFail(7);
        $category->supercategory_id = 7;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Geles";
        Supercategory::FindOrFail(7);
        $category->supercategory_id = 7;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Maquillaje";
        Supercategory::FindOrFail(7);
        $category->supercategory_id = 7;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Cuidado capilares";
        Supercategory::FindOrFail(7);
        $category->supercategory_id = 7;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Cuidado corporal";
        Supercategory::FindOrFail(7);
        $category->supercategory_id = 7;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Cuidado facial";
        Supercategory::FindOrFail(7);
        $category->supercategory_id = 7;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Higiene bucal";
        Supercategory::FindOrFail(7);
        $category->supercategory_id = 7;
        $category->save();

        //Mascotas 8

        $category = new Concretecategory();
        $category->Nombre = "Comida para gatos";
        Supercategory::FindOrFail(8);
        $category->supercategory_id = 8;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Comida para perros";
        Supercategory::FindOrFail(8);
        $category->supercategory_id = 8;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Comida para otros";
        Supercategory::FindOrFail(8);
        $category->supercategory_id = 8;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Accesorios";
        Supercategory::FindOrFail(8);
        $category->supercategory_id = 8;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Higiene";
        Supercategory::FindOrFail(8);
        $category->supercategory_id = 8;
        $category->save();

        //Infantil 9
        $category = new Concretecategory();
        $category->Nombre = "Higiene";
        Supercategory::FindOrFail(9);
        $category->supercategory_id = 9;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Alimentación infantil";
        Supercategory::FindOrFail(9);
        $category->supercategory_id = 9;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Pañales";
        Supercategory::FindOrFail(9);
        $category->supercategory_id = 9;
        $category->save();

        $category = new Concretecategory();
        $category->Nombre = "Puericultura";
        Supercategory::FindOrFail(9);
        $category->supercategory_id = 9;
        $category->save();

    }
}
