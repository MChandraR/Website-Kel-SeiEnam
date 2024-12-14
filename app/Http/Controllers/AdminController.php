<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\users;
use App\Models\Permohonan;
use Auth;

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

    public function loginPage(){
        $username = Auth::user()->username ?? "";
        return View('admin.login', compact('username'));
    }

    public function berita(){
        $username = Auth::user()->username?? "";
        return View('admin.berita', compact('username'));
    }

   
}
