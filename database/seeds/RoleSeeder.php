<?php

use App\Models\Admin\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        Role::insert([
            [
                "description" => 'ADMIN',
                'created_at' => now(),
            ],
            [
                "description" => 'GUEST',
                'created_at' => now(),
            ],
            [
                "description" => 'CUSTOMER',
                'created_at' => now(),
            ],
        ]);
    }
}
