<?php

use App\Models\Admin\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        Menu::insert([
            [
                'title' => 'Users',
                'url' => '/admin/catalogs/users',
                'icon' => 'account_circle',
            ],
            [
                'title' => 'Menus',
                'url' => '/admin/catalogs/menus',
                'icon' => 'widgets',
            ],
            [
                'title' => 'Categories',
                'url' => '/admin/catalogs/categories',
                'icon' => 'category',
            ],
            [
                'title' => 'Products',
                'url' => '/page/products',
                'icon' => 'conveyor_belt',
                'role_id' => '3',
            ],
            [
                'title' => 'Products',
                'url' => '/admin/catalogs/products',
                'icon' => 'conveyor_belt',
            ],
        ]);
    }
}
