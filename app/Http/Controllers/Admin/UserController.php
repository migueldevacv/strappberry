<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return response()->json([], Response::HTTP_OK);
    }

    public function register(Request $req)
    {
        // $validator = Validator::make($req->all(), )
        // $user = User::create();

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
