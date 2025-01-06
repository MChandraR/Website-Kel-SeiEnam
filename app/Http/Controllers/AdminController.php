<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\users;
use App\Models\Permohonan;
use Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $username = Auth::user()->username ?? "";
        $requestStat = Permohonan::all()->groupBy(function($item){ return $item->created_at->format('d-M-y'); })->toArray();
        $requestStat = json_encode($requestStat);
        $requestCount = Permohonan::count();
        $processCount = Permohonan::where('status', 'diproses')->count();
        $selesaiCount = Permohonan::where('status', 'selesai')->count();
        $pendingCount = Permohonan::where('status', 'pending')->count();
        return View('admin.dashboard', compact(['username', 'requestCount', 'selesaiCount', 'processCount', 'pendingCount', 'requestStat']));
    }

    public function permohonan(){
        $username = Auth::user()->username ?? "";
        return View('admin.permohonan', compact('username'));
    }

    public function pengaduan(){
        $username = Auth::user()->username ?? "";
        return View('admin.pengaduan', compact('username'));
    }

    public function loginPage(){
        $username = Auth::user()->username ?? "";
        return View('admin.login', compact('username'));
    }

    public function berita(){
        $username = Auth::user()->username?? "";
        return View('admin.berita', compact('username'));
    }

    public function getFile()
{
    // Ambil path dari query string
    $path = $_GET["path"];

    // Buang "storage" dari path jika ada
    $relativePath = str_replace("storage", "", $path);

    // Cek apakah file ada di storage/app/private
    if (!Storage::disk('local')->exists('private' . $relativePath)) {
        return response()->json([
            'error' => 'File not found',
            'path' => $relativePath,
        ], 404);
    }

    // Ambil isi file
    $fileData = Storage::disk('local')->get('private' . $relativePath);

    // Encode data file ke base64
    $base64Data = base64_encode($fileData);

    // Dapatkan tipe MIME file
    $mimeType = Storage::disk('local')->mimeType('private' . $relativePath);

    // Kembalikan respons berupa JSON
    return response()->json([
        'file_name' => basename($path),
        'mime_type' => $mimeType,
        'data' => $base64Data,
    ]);
}


   
}
