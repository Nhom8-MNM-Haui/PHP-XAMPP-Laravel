<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class News extends Model
{
    public function modelRead(){
        $data = DB::table("news")->orderBy('id','desc')->paginate(10);;
        return $data;
    }
    public function modelGetRecord($id){
            $data = DB::table("news")->where("id","=",$id)->first();
            return $data;
    }
    public function modelUpdate($id){
            $name = Request::get("name");
            $description = Request::get("description");
            $content = Request::get("content");
            $hot = Request::get("hot") != "" ? 1 : 0;
            DB::table("news")->where("id","=",$id)->update(array("name"=>$name,"description"=>$description,"content"=>$content,"hot"=>$hot,"id"=>$id));
            //---
            //neu user upload anh thi lay anh cu de xoa, sau do upload anh moi va update database
            if(Request::hasFile("photo")){
                //neu user chon anh de upload thi update anh
                //lay ten anh
                $photo = time()."_".Request::file("photo")->getClientOriginalName();
                //lay anh cu de xoa
                //select('photo') -> chi lay truong photo trong bang news
                $oldPhoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
                if(isset($oldPhoto->photo) && file_exists("upload/news/".$oldPhoto->photo))
                    unlink("upload/news/".$oldPhoto->photo);
                //---
                //thuc hien upload anh
                Request::file("photo")->move("upload/news",$photo);
                DB::table("news")->where("id","=",$id)->update(["photo"=>$photo]);
            }
            //---
        }
        public function modelCreate(){
            $name = Request::get("name");
            $description = Request::get("description");
            $content = Request::get("content");
            $hot = Request::get("hot") != "" ? 1 : 0;
            $photo = "";
            //---
            //neu user upload anh thi lay anh cu de xoa, sau do upload anh moi va update database
            if(Request::hasFile("photo")){
                //lay ten anh
                $photo = time()."_".Request::file("photo")->getClientOriginalName();
                //---
                //thuc hien upload anh
                Request::file("photo")->move("upload/news",$photo);
            }   
            //---
            DB::table("news")->insert(array("name"=>$name,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo));       
        }
        //xoa ban ghi
        public function modelDelete($id){
          $oldQuery =  DB::table("news")->where("id","=","$id")->select("photo")->get()->count();
            if($oldQuery>0){
                $oldPhoto = DB::table("news")->where("id","=","$id")->select("photo")->first();
                if(file_exists('upload/news/'.$oldPhoto->photo))
                   unlink('upload/news/'.$oldPhoto->photo);
            } 
            DB::table("news")->where("id","=",$id)->delete();
        }
}
