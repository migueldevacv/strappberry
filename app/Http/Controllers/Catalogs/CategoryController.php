<?php

namespace App\Http\Controllers\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([], Response::HTTP_OK);
    }

    public function show()
    {
        return response()->json([], Response::HTTP_CREATED);
    }

    public function store()
    {
        return response()->json([], Response::HTTP_CREATED);
    }

    public function update()
    {
        return response()->json([], Response::HTTP_OK);
    }

    public function destroy()
    {
        return response()->json([], Response::HTTP_OK);
    }
}
