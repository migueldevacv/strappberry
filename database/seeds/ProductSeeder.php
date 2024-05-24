<?php

use App\Models\Catalogs\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        Product::insert([
            [
                'name' => 'Laptop',
                'description' => 'beautiful',
                'image' => 'a',
                'category_id' => '1',
                'price' => '10000',
            ],
            [
                'name' => 'Laptop 2',
                'description' => 'beautiful',
                'image' => 'a',
                'category_id' => '1',
                'price' => '10000',
            ],
        ]);
    }
}
