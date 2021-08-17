<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
use Session;
class WishlistL extends Model
{
    public function modelAdd($id){
    $a = session('wishlist');
    if(!isset($a[$id])) {    
        $product = DB::table("products")->where('id',$id)->first();
        
        $a[$id] = array(
                'id' => $id,
                'name' => $product->name,
                'photo' => $product->photo
            );
        session()->put('wishlist',$a); 
        } 
    }
    public function modelDelete($id){
        $products = session('wishlist');
        unset($products[$id]);
        session()->put('wishlist',$products);
        
    }
}
