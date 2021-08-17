<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class NewsL extends Model
{
    public function modelRead(){  
        $data = DB::table("news")->orderBy('id','desc')->paginate(8);
        return $data;
    }
    public function modelGetRecord($id){
        $data = DB::table("news")->where('id',$id)->first();
        return $data;
    }
}
