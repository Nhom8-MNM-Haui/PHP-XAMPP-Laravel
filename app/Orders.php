<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class Orders extends Model
{
    public function modelRead(){
        $data = DB::table("orders")->orderBy('id','desc')->paginate(10);;
        return $data;
    }   
    /* 
    //lay mot ban ghi table orders
    public function modelGetOrders($id){
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select * from orders where id = $id");
        //tra ve mot ban ghi
        return $query->fetch();
        //---
    }
    //lay mot ban ghi trong table customers     
    public function modelGetCustomers($id){
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select * from customers where id = $id");
        //tra ve mot ban ghi
        return $query->fetch();
        //---
    }
    //lay mot ban ghi trong table products      
    public function modelGetProducts($id){
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select * from products where id = $id");
        //tra ve mot ban ghi
        return $query->fetch();
        //---
    }*/
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
