<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public $model;
    public function __construct(){
        $this->model = new News();
    }
    public function index(Request $request){
            $data = $this->model->modelRead();
            return view("backend.news_read",array("data"=>$data));
    }
    //update
    public function update($id){
        $action = url("admin/news/update/$id");
        $record = $this->model->modelGetRecord($id);
        return view("backend.news_create_update",array("record"=>$record,"action"=>$action));
    }
    //update - POST
    public function updatePost($id){
        $this->model->modelUpdate($id);
        return redirect(url('admin/news'));
    }
    //create
    public function create(){
        $action =$action = url("admin/news/create");
        return view("backend.news_create_update",["action"=>$action]);        
    }
    //crete POST
    public function createPost(){
        $this->model->modelCreate();
        return redirect(url('admin/news'));
    }
    //delete
    public function delete($id){
        $this->model->modelDelete($id);
        return redirect(url('admin/news'));
    }
}
