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
            "data" => News::all()
        ]);
    }


    public function store(Request $req){
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
}
