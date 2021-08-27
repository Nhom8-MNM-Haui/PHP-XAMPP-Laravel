<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
use Session;
class Cart extends Model
{
    public function cartAdd($id){
        $cart = session('cart');
        if(isset($cart[$id])){
            $cart[$id]['number']+= Request::get('sl');
            session()->put('cart',$cart);
        } else {
            $product = DB::table('products')->where('id',$id)->first();

            $cart[$id] = array(
                'id' => $id,
                'name' => $product->name,
                'photo' => $product->photo,
                'number' => Request::get('sl'),
                'price' => $product->price
            );
            session()->put('cart',$cart);  
        }
    }
    public function cartUpdate(){
        foreach(session('cart') as $product){
            $id = $product["id"];
            $quantity = Request::get("product_$id");
            //goi ham cartUpdate de update lai so luong
            $products = session('cart');
            if($quantity==0){
                unset($products[$id]);
                session()->put('cart',$products);
            } else {
                $products[$id]['number'] = $quantity;
                session()->put('cart',$products);
            }
        }
    }
    public function cartDelete($id){
        $products = session('cart');
        unset($products[$id]);
        session()->put('cart',$products);
    }
    public static function cartNumber(){
        $number = 0;
        foreach(Session('cart') as $product){
            $number += $product['number'];
        }
        return $number;
    }
    public static function cartTotal(){
        $total = 0;
        foreach(Session('cart') as $product){
            $total += $product['price'] * $product['number'];
        }
        return $total;
    }
    public function cartList(){
        return Session('cart');
    }
    public function cartDestroy(){
        session()->put('cart',[]);
    }
    //checkout
    public function cartCheckOut(){
        $customer_id = session('customer')['id'];
        $name = Request::get("customerName");
        $email = Request::get("customerEmail");
        $phone = Request::get("customerMobile");
        $address = Request::get("customerAddress");
        $description = Request::get("description");
        $total = 0;
        foreach(Session('cart') as $product){
            $total += $product['price'] * $product['number'];
        }
        $paymethod = Request::get("pay");

        $data = DB::table('orders')->insert(array('customer_id'=>$customer_id,'name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>$address,'description'=>$description,'paymethod'=>$paymethod,'total'=>$total));
        //lay id vua moi insert
        $order_id= DB::getPdo()->lastInsertId();

        foreach(session('cart') as $product){
            DB::table('orderdetails')->insert(array('order_id'=>$order_id,'product_id'=>$product["id"],'price'=>$product["price"],'number'=>$product["number"]));
        }
        //xoa gio hang
        session()->forget('cart');
    }
}
