<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\User;
use App\Providers\MessagesResponse;
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
        $user = User::all();
        return MessagesResponse::indexOk($user);
    }

    public function show(UserRequest $req, $id)
    {
        $user = User::find($id);
        return MessagesResponse::showOk($user);
    }

    public function store(UserRequest $req)
    {
        $user = User::create($req->validated());
        return MessagesResponse::createdOk('user', $user);
    }

    public function update(UserRequest $req, $id)
    {
        $user = User::find($id);
        $user->update($req->validated());
        return MessagesResponse::updatedOk('user', $user);
    }

    public function destroy(UserRequest $req, $id)
    {
        $user = User::find($id);
        $user->update(['status' => !$user->status]);
        return MessagesResponse::disabledOk('user', $user);
    }
}
