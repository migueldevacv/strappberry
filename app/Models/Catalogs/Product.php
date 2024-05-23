<?php

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
        'category_id',
    ];
    protected $attributes = [
        'category_id' => Category::WITHOUT_CATEGORY,
    ];
}
