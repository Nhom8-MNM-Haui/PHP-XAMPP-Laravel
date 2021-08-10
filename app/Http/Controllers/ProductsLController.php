<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductsL;
class ProductsLController extends Controller
{
    public $model;
    public function __construct(){
        $this->model = new ProductsL();
    }
    public function categories($id){
        $data = $this->model->modelRead($id);
        return view("frontend.products_categories",["data"=>$data,"category_id"=>$id]);
    }
    //chi tiet san pham
    public function detail($id){
        $record = $this->model->modelGetRecord($id);
        return view("frontend.products_detail",["record"=>$record]);
    }
    //danh gia so sao
    public function rating($id,$star){
        $this->model->createRating($id,$star);
        return redirect(url('products/detail/'.$id));
    }
}
