<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class HomeL extends Model
{
    public function modelHotProducts(){
        $data = DB::table("products")->where("hot","=","1")->orderBy('id','desc')->get();
        return $data;
    }
    public function modelNewProducts(){
            $data = DB::table("products")->where("hot","=","0")->orderBy('id','desc')->get();
            return $data;
        }
}
