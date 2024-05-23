<?php

use App\Models\Catalogs\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        Category::insert([
            [
                "description" => 'WITHOUT CATEGORY',
                'created_at' => now(),
            ],
        ]);
    }
}
