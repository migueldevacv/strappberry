<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function login()
    {
        return response()->json([], Response::HTTP_OK);
    }

    public function register()
    {

        return response()->json([], Response::HTTP_OK);
    }

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
