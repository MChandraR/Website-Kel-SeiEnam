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

        foreach($data as $pengaduan){
            $pengaduan-> nama = substr($pengaduan->nama, 0,1)."****".substr($pengaduan->nama, -1,1);
            $pengaduan-> no_whatsapp = substr($pengaduan->no_whatsapp, 0,2)."****".substr($pengaduan->no_whatsapp, -2,2);
        }

        return response()->json([
            "status" => 200,
            "message" => "Berhasil mendapatkan data pengaduan !",
            "data" => $data
        ]);
    }

    public function readmin(){
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
                    "keluhan" => $req->keluhan
                ])
            ]);
        }


        return response()->json([
            "status" => 201, 
            "message" => "Gagal menambahkan data pengaduan  :  Data tidak lengkap !",
            "data" => NULL
        ]);
    }

    public function destroy(Request $req){
        if($req->id != NULL && $req->id != ""){
            return response()->json([
                "status" => 200, 
                "message" => "Berhasil menghapus data pengaduan !",
                "data" => Pengaduan::where('_id', $req->id)->delete()
            ]);
        }

        return response()->json([
            "status" => 201, 
            "message" => "Gagal menambahkan data pengaduan  :  ID tidak ditemukan !",
            "data" => NULL
        ]);
    }
}
