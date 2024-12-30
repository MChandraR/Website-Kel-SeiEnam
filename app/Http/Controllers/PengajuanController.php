<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use Auth;use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
class PengajuanController extends Controller
{
    public function index(Request $request){
        $pengajuan = $request->query("tipe");
        return View('pengajuan', compact('pengajuan'));
    }


    public function daftar(){
        return view('daftar-pengajuan');
    }


    //0 - Ahli waris
    public function create(Request $req){
       if($req->tipe == "aw") return $this->ahliWaris($req);
       if($req->tipe == "skp") return $this->suratPenghasilan($req);
       if($req->tipe == "sk") return $this->suratKematian($req);

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

    public function suratKematian(Request $req){
        try{
            $data = $req->validate([
                "pemohon" => 'required',
                "no_whatsapp" => 'required',
                "pernyataan" => 'required|file|mimes:png',
                "kk" => 'required|file|mimes:png',
                "ktp" => 'required|file|mimes:png',
                "ahli_waris" => 'required|file|mimes:png',
            ]);

            try{
                $localPath = $req->file('pernyataan')->storeAs('/document/sk', time().'_pernyataan_'.$req->file('pernyataan')->getClientOriginalName());
                $pernyataanPath = Storage::url($localPath);
            }catch(Exception $e){

            }

            try{
                $localPath = $req->file('kk')->storeAs('/document/sk', time().'_kk_'.$req->file('kk')->getClientOriginalName());
                $kkPath = Storage::url($localPath);
            }catch(Exception $e){

            }

            try{
                $localPath = $req->file('ktp')->storeAs('/document/sk', time().'_ktp_'.$req->file('ktp')->getClientOriginalName());
                $ktpPath = Storage::url($localPath);
            }catch(Exception $e){

            }

            try{
                $localPath = $req->file('ahli_waris')->storeAs('/document/sk', time().'_ahli_waris_'.$req->file('ahli_waris')->getClientOriginalName());
                $ahliPath = Storage::url($localPath);
            }catch(Exception $e){

            }

            return response()->json([
                "status" => 200,
                "message" => "Berhasil mengajukan permohonan !",
                "data" => Permohonan::create([
                    "pemohon" => $req->pemohon,
                    "no_whatsapp" => $req->no_whatsapp,
                    "surat_pernyataan" => $pernyataanPath,
                    "kk" => $kkPath,
                    "ktp" => $ktpPath,
                    "ahli_waris" => $ahliPath,
                    "tipe" => 2,
                    "status" => "pending",
                ])
            ], 200);


        }catch(ValidationException $th){
            return response()->json([
                "status" => 401,
                "message" => "Data tidak boleh kosong !",
                "data" => NULL
            ]);
        }
    }

    public function daftarAjuan(){
        $data = Permohonan::select(["pemohon", "no_whatsapp","tipe", "status"])->get();

        foreach($data as $dat){
            $dat->no_whatsapp = "08******".substr($dat->no_whatsapp, -4,4);
            $dat->pemohon = substr($dat->pemohon, 0,3). "*****".substr($dat->pemohon, -3,3);
        }

        return response()->json([
            "status" => 200,
            "message" => "Berhasil mengambil data permohonan !",
            "data" => $data
        ]);
    }


    //Fungsi untuk mengupdate data pengajuan atau memproses pengajuan oleh admin
    public function update(Request $req){
        $updateData = [];
        if($req->id != NULL && $req->id != ""){
            if($req->status != NULL && $req->status != "")$updateData["status"] = $req->status;

            return response()->json([
                "status" => 200,
                "message" => "Berhasil megnupdate data permohonan !",
                "data" => Permohonan::where('_id', $req->id)->update($updateData)
            ]);

        }

        return response()->json([
            "status" => 201,
            "message" => "Gagal mengupdate data permohonan : id tidak ditemukan !",
            "data" => NULL
        ]);
    }

    public function suratPenghasilan(Request $req){

        try{

            $validate = $req->validate([
                'tipe' => 'required',
                'pemohon' => 'required',
                'no_whatsapp' => 'required',
                'ktp' => 'required|file|mimes:png',
                'penghasilan' => 'required|file|mimes:png'
            ]);


            try{
                $imagePath = $req->file("ktp")->storeAs('/document/skp', time().'_ktp_'.$req->file('ktp')->getClientOriginalName());
                $ktpPath = Storage::url($imagePath);
            }catch(Exception $e){
                error_log($e);
            }

            try{
                $imagePath = $req->file("penghasilan")->storeAs('/document/skp', time().'_penghasilan_'.$req->file('penghasilan')->getClientOriginalName());
                $penghasilanPath = Storage::url($imagePath);
            }catch(Exception $e){
                error_log($e);
            }


            return response()->json([
                "status" => 200,
                "message" => "Berhasil mengajukan permohonan !",
                "data" => Permohonan::create([
                    "tipe" => 1,
                    "pemohon" => $req->pemohon,
                    "no_whatsapp" => $req->no_whatsapp,
                    "ktp" => $ktpPath,
                    "status" => "pending",
                    "surat_penghasilan" => $penghasilanPath
                ])
            ]);

        }catch(ValidationException $th){
            return response()->json([
                "status" => 401,
                "message" => "Data tidak boleh kosong !",
                "data" => NULL
            ]);
        }

    }


    //Fungsi untuk menambahkan data ahli waris
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
