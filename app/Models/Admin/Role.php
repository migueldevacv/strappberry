<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'description',
        'status'
    ];

    public const ADMIN = 1;
    public const GUEST = 2;
    public const CUSTOMER = 3;
}
