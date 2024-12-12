<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use Auth;
class PengajuanController extends Controller
{
    public function index(Request $request){
        $pengajuan = $request->query("tipe");
        return View('pengajuan', compact('pengajuan'));
    }


    //0 - Ahli waris
    public function create(Request $req){
       if($req->tipe == "aw") return $this->ahliWaris($req);

       return response()->json([
            "status" => 201,
            "message" => "Tipe tidak diketahui !",
            "data" => $req
        ]);
    }

    public function get(){
        // if(!Auth::user()){
        //     return response()->json([
        //         "status" => 400,
        //         "message" => "Berhasil mengambil data permohonan !",
        //         "data" => null
        //     ]);
        // }

        return response()->json([
            "status" => 200,
            "message" => "Berhasil mengambil data permohonan !",
            "data" => Permohonan::all()
        ]);
    }


    public function ahliWaris(Request $req){
        if( 
            $req->pemohon != NULL && $req->pemohon != "" &&
            $req->no_whatsapp != NULL && $req->no_whatsapp != "" &&
            $req->tgl_meninggal != NULL && $req->tgl_meninggal != ""  &&
            $req->no_akte_kematian != NULL && $req->no_akte_kematian != "" &&
            $req->no_kartu_keluarga != NULL && $req->no_kartu_keluarga != "" && 
            $req->ahli_waris != NULL && count($req->ahli_waris)
            ){

            foreach($req->ahli_waris as $ahli){
                if(
                    $ahli["nama"] == NULL || $ahli["nama"]== ""||
                    $ahli["tgl_lahir"] == NULL || $ahli["tgl_lahir"] == "" ||
                    $ahli["nik"] == NULL || $ahli["nik"] == ""
                ){
                    return response()->json([
                        "status" => 201,
                        "message" => "Data ahli waris tidak valid !",
                        "data" => $req
                    ]);
                }
            }

            

            return response()->json([
                "status" => 200,
                "message" => "Permohonan berhasil dibuat !",
                "data" => Permohonan::create([
                    "pemohon" => $req->pemohon,
                    "tipe" => 0,
                    "status" => "pending",
                    "no_whatsapp" => $req->no_whatsapp,
                    "tgl_meninggal" => $req->tgl_meninggal,
                    "no_akte_kematian" => $req->no_akte_kematian,
                    "no_kartu_keluarga" => $req->no_kartu_keluarga,
                    "ahli_waris" => $req->ahli_waris,
                ])
            ]);
        }     
        
        
        return response()->json([
            "status" => 201,
            "message" => "Data tidak boleh kosong !",
            "data" => $req
        ]);
    }
    
}
