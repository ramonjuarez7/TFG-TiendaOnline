<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;
use App\Models\Product;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('coupons')->delete();

        $coupon = new Coupon();
        $coupon->product_id = Product::findOrFail(1)->id;
        $coupon->Descuento = 0.20;
        $coupon->save();

        $coupon = new Coupon();
        $coupon->product_id = Product::findOrFail(2)->id;
        $coupon->Descuento = 0.15;
        $coupon->save();

        $coupon = new Coupon();
        $coupon->product_id = Product::findOrFail(3)->id;
        $coupon->Descuento = 0.25;
        $coupon->save();

        $coupon = new Coupon();
        $coupon->product_id = Product::findOrFail(4)->id;
        $coupon->Descuento = 0.30;
        $coupon->save();


    }
}
