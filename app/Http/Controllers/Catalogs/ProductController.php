<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Requests\Catalogs\ProductRequest;
use App\Http\Controllers\Controller;
use App\Providers\MessagesResponse;
use App\Models\Catalogs\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return MessagesResponse::indexOk($product);
    }

    public function show(ProductRequest $req, $id)
    {
        $product = Product::find($id);
        return MessagesResponse::showOk($product);
    }

    public function store(ProductRequest $req)
    {
        $product = Product::create($req->validated());
        return MessagesResponse::createdOk('product', $product);
    }

    public function update(ProductRequest $req, $id)
    {
        $product = Product::find($id);
        $product->update($req->validated());
        return MessagesResponse::updatedOk('product', $product);
    }

    public function destroy(ProductRequest $req, $id)
    {
        $product = Product::find($id);
        $product->update(['status' => !$product->status]);
        return MessagesResponse::disabledOk('product', $product);
    }
}
