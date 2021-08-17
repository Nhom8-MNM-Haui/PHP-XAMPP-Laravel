<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class ProductsL extends Model
{
    public function modelRead($category_id){
            $sqlOrder = Request::get("sort");
            if($sqlOrder==Null||$sqlOrder=='default'){
                $data = DB::table("products")->whereIn('category_id', DB::table('categories')->where('id',$category_id)->orwhere('parent_id',$category_id)->pluck('id'))->orderBy('id','desc');
            }else{
                switch($sqlOrder){
                    case "priceAsc":
                        $name = "price";
                        $order = "asc";
                    break;
                    case "priceDesc":
                        $name = "price";
                        $order = "desc";
                    break;
                    case "nameAsc":
                        $name = "name";
                        $order = "asc";
                    break;
                    case "nameDesc":
                        $name = "name";
                        $order = "desc";
                    break;
                }
                $data = DB::table("products")->whereIn('category_id', DB::table('categories')->where('id',$category_id)->orwhere('parent_id',$category_id)->pluck('id'))->orderBy($name,$order);
            }
            $data = $data->paginate(10);
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
    //tim kiem theo ten
    public function searchPost(){
        $key = Request::get('searchkey');
        $fromPrice = Request::get('fromPrice');
        $toPrice = Request::get('toPrice');
        if($key==null){
            $data = DB::table("products")->where([['price','>=',$fromPrice],['price','<=',$toPrice]])->paginate(10);
        }
        if($fromPrice==null&&$toPrice==null){
            $data = DB::table("products")->where('name','like','%'.$key.'%')->paginate(10);
        }
        return $data;
    }
}
