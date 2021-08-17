<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeL;
class HomeLController extends Controller
{
    public $model;
    public function __construct(){
        $this->model = new HomeL();
    }
    public function index(){
        $hotProducts = $this->model->modelHotProducts();
        $newsProducts = $this->model->modelHotProducts();
        return view("frontend.home",array("hotProducts"=>$hotProducts,"newsProducts"=>$newsProducts));
    }
}
