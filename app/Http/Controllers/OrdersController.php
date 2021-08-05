<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
class OrdersController extends Controller
{
    public $model;
    public function __construct(){
        $this->model = new Orders();
    }
    public function index(){
        $listRecord = $this->model->modelRead();
        return view("backend.orders_view",array("listRecord"=>$listRecord));
    } 
    //xac nhan da giao hang
    public function delivery($id){
        $this->model->modelDelivery($id);
        return redirect(url('admin/orders'));
    }   
    //chi tiet don hang
    public function detail($id){
        $data = $this->model->modelListOrderDetails($id);
        //load view
        return view("backend.orders_detail",["data"=>$data,"id"=>$id]);
    }
}
