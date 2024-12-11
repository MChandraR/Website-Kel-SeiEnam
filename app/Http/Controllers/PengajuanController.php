<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index(Request $request){
        $pengajuan = $request->query("tipe");
        return View('pengajuan', compact('pengajuan'));
    }
}
