<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class ProductsL extends Model
{
    public function modelRead($category_id){
        $sqlOrder = " order by id desc ";
        //lay bien order truyen tu url
        $order = Request::get('order')!=""?Request::get('order'):"";
        switch($order){
            case "priceAsc":
                $sqlOrder = " order by price asc ";
            break;
            case "priceDesc":
                $sqlOrder = " order by price desc ";
            break;
            case "nameAsc":
                $sqlOrder = " order by name asc ";
            break;
            case "nameDesc":
                $sqlOrder = " order by name desc ";
            break;
        }
        //---
        $data = DB::table("products")->whereIn('category_id', DB::table('categories')->where('id',$category_id)->orwhere('parent_id',$category_id)->pluck('id'))->orderBy('id','desc')->paginate(10);
        //---
        return $data;
    }
    public function modelGetRecord($id){
        $data = DB::table("products")->where('id',$id)->first();
        return $data;
    }
    //lay mot ban ghi tuong ung voi id truyen vao
    public static function getCategory($category_id){
        $data = DB::table("categories")->where('id',$category_id)->select("name")->first();
        return count((array)$data) > 0 ? $data->name : "";
    } 
    //danh gia
    public function createRating($id,$star){
        DB::table("rating")->insert(array("product_id"=>$id,"star"=>$star));
    }
    //lay so sao tuong ung voi id truyen vao
    public static function getStar($id,$star){
       $data = DB::table("rating")->where([['product_id',$id],['star',$star]])->select('id')->get();
       $data = json_decode(json_encode($data),true);
        return count($data);
    }      
}
