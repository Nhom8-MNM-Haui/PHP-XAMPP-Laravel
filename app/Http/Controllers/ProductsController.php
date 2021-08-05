<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
class ProductsController extends Controller
{
    public $model;
    public function __construct(){
        $this->model = new Products();
    }
    public function index(Request $request){
            $data = $this->model->modelRead();
            return view("backend.products_read",array("data"=>$data));
    }
    //update
    public function update($id){
        $action = url("admin/products/update/$id");
        $record = $this->model->modelGetRecord($id);
        return view("backend.products_create_update",array("record"=>$record,"action"=>$action));
    }
    //update - POST
    public function updatePost($id){
        $this->model->modelUpdate($id);
        return redirect(url('admin/products'));
    }
    //create
    public function create(){
        $action =$action = url("admin/products/create");
        return view("backend.products_create_update",["action"=>$action]);        
    }
    //crete POST
    public function createPost(){
        $this->model->modelCreate();
        return redirect(url('admin/products'));
    }
    //delete
    public function delete($id){
        $this->model->modelDelete($id);
        return redirect(url('admin/products'));
    }
}
