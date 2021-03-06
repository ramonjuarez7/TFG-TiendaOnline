<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Coupon;
use Illuminate\Support\Facades\Crypt;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->delete();

        $user = new User();
        $user->Email = "admin1@butore.com";
        $user->DNI_NIF = "00000000A";
        $user->Nombre = "Ramón";
        $user->Apellidos = "Juárez Cánovas";
        $user->Password = Crypt::encryptString("123");
        $user->Nacimiento = "12/04/1998";
        $user->Registro = "06/04/2022";
        $user->Telefono = 677890588;
        $user->Direccion_envio = "Calle Monseñor Espinosa 1A";
        $user->Direccion_facturacion = "Calle Monseñor Espinosa 1A";
        $user->Privilegios = true;
        $user->save();

        $user->addCoupon(Coupon::FindOrFail(1), 2);
        $user->addCoupon(Coupon::FindOrFail(2), 2);
        $user->addCoupon(Coupon::FindOrFail(3), 2);
        $user->addCoupon(Coupon::FindOrFail(4), 2);

        $user = new User();
        $user->Email = "user1@butore.com";
        $user->DNI_NIF = "00000000B";
        $user->Nombre = "Miguel";
        $user->Apellidos = "Vázquez Sánchez";
        $user->Password = Crypt::encryptString("123");
        $user->Nacimiento = "22/04/1993";
        $user->Registro = "06/04/2022";
        $user->Telefono = 677890534;
        $user->Direccion_envio = "Gran Via 43";
        $user->Direccion_facturacion = "Gran Via 43";
        $user->Privilegios = false;
        $user->save();

        
    }
}
