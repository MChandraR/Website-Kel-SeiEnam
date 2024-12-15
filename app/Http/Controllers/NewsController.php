<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        return response()->json([
            "status" => 200,
            "message" => "Berhasil mengambil data berita !",
            "data" => News::orderBy('time', "DESC")->get()
        ]);
    }


    public function store(Request $req){

        if(
            $req->title != NULL && $req->title !="" &&
            $req->time != NULL && $req->time !="" &&
            $req->content != NULL && $req->content !="" 
        ){
            return response()->json([
                "status" => 200,
                "message" => "Berhasil menambahkan data berita !",
                "data" => News::create([
                    "title" => $req->title,
                    "time" => $req->time,
                    "content" => $req->content
                ])
            ]);
        }

        return response()->json([
            "status" => 201,
            "message" => "Gagal Menambahkan data berita : Field tidak lengkap !",
            "data" => NULL
        ]);
    }

    public function update(Request $req){
        $update = [];
        if($req->id != NULL && $req->id != "" ){
            if($req->title != NULL && $req->title != "") $update["title"] = $req->title;
            if($req->time != NULL && $req->time != "") $update["time"] = $req->time;
            if($req->content != NULL && $req->content != "") $update["content"] = $req->content;
            return response()->json([
                "status" => 200,
                "message" => "Berhasil mengupdate data berita !",
                "data" => [
                    "result " => News::where('_id', $req->id)->update($update)
                ]
            ]);
        
        }

        return response()->json([
            "status" => 201,
            "message" => "Gagal mengupdate berita : id tidak ditemukan !",
            "data" => $req->data
        ]);
    }


    public function destroy(Request $req){
        if($req->id != NULL && $req->id != ""){
            return response()->json([
                "status" => 200,
                "message" => "Berhasil menghapus data berita !",
                "data" => News::where('id', $req->id)->delete()
            ]);
        }

        return response()->json([
            "status" => 201,
            "message" => "Gagal menghapus berita : id tidak ditemukan !",
            "data" => $req->data
        ]);
    }
}
