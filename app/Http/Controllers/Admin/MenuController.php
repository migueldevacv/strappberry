<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuRequest;
use App\Models\Admin\Menu;
use App\Providers\MessagesResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return MessagesResponse::indexOk($menu);
    }

    public function show(MenuRequest $req, $id)
    {
        $menu = Menu::find($id);
        return MessagesResponse::showOk($menu);
    }

    public function store(MenuRequest $req)
    {
        $menu = Menu::create($req->validated());
        return MessagesResponse::createdOk('menu', $menu);
    }

    public function update(MenuRequest $req, $id)
    {
        $menu = Menu::find($id);
        $menu->update($req->validated());
        return MessagesResponse::updatedOk('menu', $menu);
    }

    public function destroy(MenuRequest $req, $id)
    {
        $menu = Menu::find($id);
        $menu->update(['status' => !$menu->status]);
        return MessagesResponse::disabledOk('menu', $menu);
    }
}
