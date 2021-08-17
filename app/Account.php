<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
use Session;
class Account extends Model
{
    public function modelRegister(){
        $email = Request::get('email');
        $check = DB::table('customers')->where('email',$email)->select('id')->get();
        return json_decode(json_encode($check),true);
        
    }
    public function modelLogin(){
        $email = Request::get('email');
        $password = Request::get('password');
        $password = md5($password);
        $record = DB::table('customers')->where([['password',$password],['email',$email]])->get();
        return json_decode(json_encode($record),true);
    }
    public function getInfoCustomer(){
        $data = DB::table('customers')->where('id',session('customer')['id'])->first();
        return $data;
    }
    //thông tin đơn hàng
    public function modelRead(){
        $data = DB::table('orders')->orderBy('id','desc')->orderBy('status','desc')->where('customer_id',session('customer')['id'])->paginate(5);
        return $data;
    }
    public function modelRemoveOrders($id){
        DB::table('orders')->where('id',$id)->update(['status'=> 3]);
    }
    public function modelListOrderDetails($id){
        $data = DB::table('orderdetails')->where('order_id',$id)->get();
        return $data;
    }
    public function modelGetOrders($id){
        $data = DB::table('orders')->where('id',$id)->first();
        return $data;
    }
    public static function modelGetProducts($id){
        $data = DB::table('products')->where('id',$id)->first();
        return $data;
    }
    //cap nhat thong tin ca nhan
    public function updateInfoPost(){
        $name = Request::get('name');
        $address = Request::get('address');
        $phone = Request::get('phone');
        Session()->flash('UpdateSuccessful', 'Cập nhật thông tin thành công');
        DB::table('customers')->where('id',session('customer')['id'])->update(array('name'=>$name,'address'=>$address,'phone'=>$phone));
    }
}
