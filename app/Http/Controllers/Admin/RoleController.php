<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Admin\Role;
use App\Providers\MessagesResponse;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return response()->json($role, Response::HTTP_OK);
    }

    public function show(RoleRequest $req, $id)
    {
        $role = Role::find($id);
        return response()->json($role, Response::HTTP_OK);
    }

    public function store(RoleRequest $req)
    {
        $role = Role::create($req->toArray());
        return MessagesResponse::createdOk('role', $role);
    }

    public function update(RoleRequest $req, $id)
    {
        $role = Role::find($id);
        $role->update($req->toArray());
        return MessagesResponse::updatedOk('role', $role);
    }
    
    public function destroy(RoleRequest $req, $id)
    {
        $role = Role::find($id);
        $role->update(['status' => !$role->status]);
        return MessagesResponse::disabledOk('role', $role);
    }
}
