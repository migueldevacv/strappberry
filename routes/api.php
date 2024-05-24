<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'Admin\UserController@login');
Route::post('register', 'Admin\UserController@register');

Route::middleware('jwt')->group(function () {
    Route::resource('roles', 'Admin\RoleController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('menus', 'Admin\MenuController');
    Route::resource('categories', 'Catalogs\CategoryController');
    Route::resource('products', 'Catalogs\ProductController');
});
