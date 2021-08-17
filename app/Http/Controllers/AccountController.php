<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Account;
class AccountController extends Controller
{
    public $model;
    public function __construct(){
        $this->model = new Account();
    }
    public function register(){
        return view("frontend.account_register");
    }
    public function registerPost(Request $request){
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $password = $request->password;
        $check = $this->model->modelRegister();  
        if(count($check) == 0){
            $password = md5($password);
            DB::table('customers')->insert(array("name"=>$name,'email'=>$email,'address'=>$address,'phone'=>$phone,'password'=>$password));
            //di chuyen den trang login
            session()->flash('success', 'Đăng ký thành công');
            return redirect(url('account/login'));
        }else{
            session()->flash('exists', 'Email đã tồn tại!');
            return redirect(url('account/register'));
        }       
    }
    public function login(){
        return view("frontend.account_login");
    }
    
    public function loginPost(){
        $record = $this->model->modelLogin();
        if(count($record) > 0){
            $customer = array(
                'email'=>$record[0]['email'],
                'id'=>$record[0]['id'],
                'name'=>$record[0]['name']
            );
            session()->put('customer',$customer);
            return redirect(url('/'));
        }else{
            session()->flash('loginFail', 'Email hoặc mật khẩu không đúng');
            return redirect(url('account/login'));
        }
    }
    public function logout(){
        session()->forget('customer');
        return redirect(url('/'));
    }
    public function personal(){
       $customer = $this->model->getInfoCustomer();
       return view('frontend.InfoPerson',array('customer'=>$customer));
    }
    public function orders(){
        $customer = $this->model->getInfoCustomer();
        $listRecord = $this->model->modelRead();
        return view("frontend.InfoOrder",array("listRecord"=>$listRecord,"customer"=>$customer));
    }
    public function removeOrders($id){
        $this->model->modelRemoveOrders($id);
        return redirect(url('account/orders'));
    }
    public function detail($id){
        $data = $this->model->modelListOrderDetails($id);
        $order = $this->model->modelGetOrders($id);
        return view("frontend.InfoOrderDetail",["data"=>$data,"order"=>$order]);
    }
    public function updateInfo(){
        $customer = $this->model->getInfoCustomer();
        return view("frontend.updateAccount",array('customer'=>$customer));
    }
    public function update(){
        $this->model->updateInfoPost();
        $data = $this->model->getInfoCustomer();
        $customer = array(
                'email'=>$data->email,
                'id'=>$data->id,
                'name'=>$data->name
            );
            session()->put('customer',$customer);
        return redirect(url('account/personal'));
    }
}
