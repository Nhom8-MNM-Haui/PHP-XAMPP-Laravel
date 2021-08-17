<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductsL;
use DB;
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
    //hiển thị sản phẩm khi nhập từ khóa
    public function ajax($key){
        $result = DB::table('products')->where('name','like','%'.$key.'%')->get();
        $strResult = "";
        foreach($result as $rows)
            $strResult = $strResult."<li><img src='upload/products/{$rows->photo}'><a href='products/detail/{$rows->id}'>{$rows->name}</a></li>";
        echo $strResult;
    }
    //tìm kiếm sản phẩm theo tên hoặc theo giá
    public function search(){
        $data = $this->model->searchPost();
        return view("frontend.searchView",["data"=>$data]);
    }
}
