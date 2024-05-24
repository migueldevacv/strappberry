<?php

use App\Models\Admin\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        //$2y$10$zzBrqYZHXHKXXhPBpYvsJOv6pZPVi3TyleuNGU0.usr9zVAK1awFu administrator
        User::insert([
            [
                'name' => 'Administrator',
                'email' => 'user@admin.com',
                'password' => '$2y$10$zzBrqYZHXHKXXhPBpYvsJOv6pZPVi3TyleuNGU0.usr9zVAK1awFu',
                'role_id' => '1',
            ]
        ]);
    }
}
