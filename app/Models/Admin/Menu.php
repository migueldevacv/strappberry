<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'url',
        'icon',
        'menu_id',
        'role_id',
        'status',
    ];

    protected $attributes = [  
        'menu_id' => null,
        'role_id' => Role::ADMIN,
    ];
}
