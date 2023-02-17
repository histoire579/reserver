<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Categorie::factory(10)->create();
        User::factory()
              ->count(10)
              ->has(
                Order::factory(3)
                ->hasAttached(
                    Product::factory()->count(5),
                    ['total_price' =>rand(100, 500), 'total_qty' =>rand(1, 3),'tva' =>rand(10, 50)]
                    
                )
              )->create();
    }
}
