<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('orders')->delete();
        \DB::table('order_product')->delete();

        $order = new Order();
        $user = User::findOrFail(1);
        $order->user_id = $user->id;
        $order->Precio_total = 0;
        $order->Pagado = true;
        $order->Entregado = true;
        $order->save();
        $order->addProduct(Product::findOrFail(1),3,0);
        $order->addProduct(Product::findOrFail(2),2,0);
        $order->addProduct(Product::findOrFail(3),5,0);
        $order->Precio_total = $order->calcularTotal();
        $order->save();

        $order = new Order();
        $user = User::findOrFail(1);
        $order->user_id = $user->id;
        $order->Precio_total = 0;
        $order->Pagado = true;
        $order->Entregado = false;
        $order->save();
        $order->addProduct(Product::findOrFail(1),1,0);
        $order->addProduct(Product::findOrFail(2),6,0);
        $order->addProduct(Product::findOrFail(3),2,0);
        $order->Precio_total = $order->calcularTotal();
        $order->save();

        $order = new Order();
        $user = User::findOrFail(1);
        $order->user_id = $user->id;
        $order->Precio_total = 0;
        $order->Pagado = false;
        $order->Entregado = false;
        $order->save();
        $order->addProduct(Product::findOrFail(1),7,0);
        $order->addProduct(Product::findOrFail(2),1,0);
        $order->addProduct(Product::findOrFail(3),4,0);
        $order->Precio_total = $order->calcularTotal();
        $order->save();

        $order = new Order();
        $user = User::findOrFail(2);
        $order->user_id = $user->id;
        $order->Precio_total = 0;
        $order->Pagado = true;
        $order->Entregado = true;
        $order->save();
        $order->addProduct(Product::findOrFail(1),3,0);
        $order->addProduct(Product::findOrFail(2),2,0);
        $order->addProduct(Product::findOrFail(3),5,0);
        $order->Precio_total = $order->calcularTotal();
        $order->save();

        $order = new Order();
        $user = User::findOrFail(2);
        $order->user_id = $user->id;
        $order->Precio_total = 0;
        $order->Pagado = true;
        $order->Entregado = false;
        $order->save();
        $order->addProduct(Product::findOrFail(1),1,0);
        $order->addProduct(Product::findOrFail(2),6,0);
        $order->addProduct(Product::findOrFail(3),2,0);
        $order->Precio_total = $order->calcularTotal();
        $order->save();

        $order = new Order();
        $user = User::findOrFail(2);
        $order->user_id = $user->id;
        $order->Precio_total = 0;
        $order->Pagado = false;
        $order->Entregado = false;
        $order->save();
        $order->addProduct(Product::findOrFail(1),7,0);
        $order->addProduct(Product::findOrFail(2),1,0);
        $order->addProduct(Product::findOrFail(3),4,0);
        $order->Precio_total = $order->calcularTotal();
        $order->save();

    }
}
