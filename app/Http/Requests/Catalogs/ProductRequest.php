<?php

namespace App\Http\Requests\Catalogs;

use App\Http\Requests\NaturalCrudRequest;
use App\Models\Catalogs\Product;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProductRequest extends NaturalCrudRequest
{

    protected $_model = 'product';
    protected $_table = 'products';
    protected $_modelClass = Product::class;

    public function mapResponses()
    {
        return [
            Request::METHOD_GET => fn () => self::tryFindId(),
            Request::METHOD_POST => fn () => self::rulesPost(),
            Request::METHOD_PUT => fn () => self::tryFindId(self::rulesPut($this->route()->parameter($this->_model))),
            Request::METHOD_DELETE => fn () => self::tryFindId(),
        ];
    }

    public function rulesPost()
    {
        return [
            'name' => 'required|string|max:50|min:5',
            'description' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function rulesPut($id)
    {
        return [
            'name' => 'required|string|max:50|min:5',
            'description' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
