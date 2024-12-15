<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index(){
        return View('pengaduan');
    }

    public function daftar(){
        return View('daftar-aduan');
    }

    public function read(){
        $data = Pengaduan::all();

        return response()->json([
            "status" => 200,
            "message" => "Berhasil mendapatkan data pengaduan !",
            "data" => $data
        ]);
    }

    public function store(Request $req){
        if(
            $req->nama != NULL && $req->nama != "" &&
            $req->no_whatsapp != NULL && $req->no_whatsapp != "" &&
            $req->keluhan != NULL && $req->keluhan != "" 
        ){
            return response()->json([
                "status" => 200, 
                "message" => "Berhasil menambahkan data pengaduan !",
                "data" => Pengaduan::create([
                    "nama" => $req->nama,
                    "no_whatsapp" => $req->no_whatsapp,
                    "keluahn" => $req->keluhan
                ])
            ]);
        }


        return response()->json([
            "status" => 201, 
            "message" => "Gagal menambahkan data pengaduan  : Field tidak lengkap !",
            "data" => NULL
        ]);
    }
}
