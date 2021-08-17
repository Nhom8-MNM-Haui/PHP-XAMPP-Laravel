<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
class CartController extends Controller
{
    public $model;
    public function __construct(){
        $this->model = new Cart();
        if(!session()->has('cart'))
            session()->put('cart',[]);
    }
    //hien thi gio hang
    public function index(){
        return view("frontend.cart");
    }
    public function create($id){
        $this->model->cartAdd($id);
        return redirect(url('products/detail/'.$id));
    }
    public function delete($id){
        $this->model->cartDelete($id);
         return redirect(url('cart'));
    }
    public function update(){
        $this->model->cartUpdate();
        return redirect(url('cart'));
    }
    //xoa toan bo gio hang
    public function destroy(){
        $this->model->cartDestroy();
        return redirect(url('cart'));
    }
    public function checkout(){
        if(!session()->has('customer'))
            return redirect(url('account/login'));
        else
            return redirect(url('cart/pay'));
    }
    public function checkpay(){
        $this->model->cartCheckOut();
        return redirect(url('cart/success'));
    }
    public function pay(){
        return view("frontend.pay_orders");
    }
    public function success(){
        return view("frontend.order_success");
    }
}
