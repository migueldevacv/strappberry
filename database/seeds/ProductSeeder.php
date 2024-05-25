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
                'category_id' => '1',
                'price' => '10000',
            ],
            [
                'name' => 'Laptop 2',
                'description' => 'beautiful',
                'category_id' => '1',
                'price' => '13223',
            ],
            [
                'name' => 'Laptop 3',
                'description' => 'beautiful',
                'category_id' => '1',
                'price' => '1412',
            ],
            [
                'name' => 'Laptop 4',
                'description' => 'beautiful',
                'category_id' => '1',
                'price' => '41123',
            ],
            [
                'name' => 'Laptop 5',
                'description' => 'beautiful',
                'category_id' => '1',
                'price' => '1412',
            ],
            [
                'name' => 'Laptop 6',
                'description' => 'beautiful',
                'category_id' => '1',
                'price' => '41123',
            ],
        ]);
    }
}
