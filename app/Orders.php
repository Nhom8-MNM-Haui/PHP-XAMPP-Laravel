<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class Orders extends Model
{
    public function modelRead(){
        $data = DB::table("orders")->orderBy('id','desc')->paginate(10);
        return $data;
    }   
    //xac nhan da giao hang
    public function modelDelivery($id){
        DB::table("orders")->where("id","=",$id)->update(array("status"=>"1"));
    }
    //lay danh sach cac san pham trong talbe orderdetails
    public function modelListOrderDetails($id){
        $data = DB::table("orderdetails")->where("order_id","=",$id)->get();
        return $data;
    }
}
