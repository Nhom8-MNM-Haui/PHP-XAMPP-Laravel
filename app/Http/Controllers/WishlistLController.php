<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WishlistL;
class WishlistLController extends Controller
{
    public $model;
    public function __construct(){
        $this->model = new WishlistL();
        if(!session()->has('wishlist'))
            session()->put('wishlist',[]);
    }
    public function create($id){
        $this->model->modelAdd($id);
        return redirect(url('wishlist'));
    }
    public function index(){
        return view("frontend.wish_list");
    }
    public function delete($id){
        $this->model->modelDelete($id);
        return redirect(url('wishlist'));
    }
}
