<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsL;
class NewsLController extends Controller
{
    public $model;
    public function __construct(){
        $this->model = new NewsL();
    }
    public function index(){
        $data = $this->model->modelRead();
        return view("frontend.news",["data"=>$data]);
    }
    public function detail($id){
        $record = $this->model->modelGetRecord($id);
        return view("frontend.news_detail",["record"=>$record]);    }
}
