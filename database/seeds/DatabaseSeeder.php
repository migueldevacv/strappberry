<?php

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
        RoleSeeder::run();
        CategorySeeder::run();
        MenuSeeder::run();
        ProductSeeder::run();
        UserSeeder::run();
        // $this->call(UsersTableSeeder::class);
    }
}
