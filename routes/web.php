<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\HomeLController;
use App\Http\Controllers\ProductsLController;
Route::get('login', function() {
    return view('backend.login');
});
Route::get('logout', function() {
    Auth::logout();
    return redirect(url('login'));
});
Route::post('login', function() {
    $email = Request::get("email");
    $password = Request::get("password");
    if(Auth::attempt(['email' => $email, 'password' => $password]))
        return redirect(url('admin'));
    else
        return redirect(url('login'));
});


Route::group(['prefix' => 'admin',"middleware"=>"checklogin"], function() {
    //-----
    Route::get('/', function() {
        return view('backend.layout');
    });
    Route::get("users","UsersController@read");
    //-----
    // chức năng user
    //Route::get("users/create",[UsersController::class,"create"]);
    Route::get("users/create","UsersController@create");
    Route::post("users/create","UsersController@createPost");
    Route::get("users/update/{id}","UsersController@update");
    Route::post("users/update/{id}","UsersController@updatePost");
    Route::get("users/delete/{id}","UsersController@delete");

    // chức năng categories
    Route::get("categories","CategoriesController@read");
    Route::get("categories/create","CategoriesController@create");
    Route::post("categories/create","CategoriesController@createPost");
    Route::get("categories/update/{id}","CategoriesController@update");
    Route::post("categories/update/{id}","CategoriesController@updatePost");
    Route::get("categories/delete/{id}","CategoriesController@delete");
    // chức năng news
    Route::get("news","NewsController@index");
    Route::get("news/create","NewsController@create");
    Route::post("news/create","NewsController@createPost");
    Route::get("news/update/{id}","NewsController@update");
    Route::post("news/update/{id}","NewsController@updatePost");
    Route::get("news/delete/{id}","NewsController@delete");
    // chức năng products
    Route::get("products","ProductsController@index");
    Route::get("products/create","productsController@create");
    Route::post("products/create","ProductsController@createPost");
    Route::get("products/update/{id}","ProductsController@update");
    Route::post("products/update/{id}","ProductsController@updatePost");
    Route::get("products/delete/{id}","ProductsController@delete");
    // chức năng orders
    Route::get("orders","OrdersController@index");
    Route::get("orders/detail/{id}","OrdersController@detail");
    Route::get("orders/delivery/{id}","OrdersController@delivery");
});
//frontend
Route::get("/","HomeLController@index");
Route::get("products/categories/{id}","ProductsLController@categories");
Route::get("products/detail/{id}","ProductsLController@detail");
Route::get("products/rating/{id}/star={star}","ProductsLController@rating");