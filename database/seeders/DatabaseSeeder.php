<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SupercategoryTableSeeder::class);
        $this->call(ConcretecategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CouponTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        
    }
}
