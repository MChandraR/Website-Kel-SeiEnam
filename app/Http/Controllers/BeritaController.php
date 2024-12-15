<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class BeritaController extends Controller
{
    public function index(Request $req){
        $id = $req->query("id");
        $berita = News::where('_id', $id)->first();
        $date = date("D, d M Y", strtotime($berita->time));
        $berita->time = $date;

        $beritaList = News::take(10)->get();

        return View('berita', compact(['berita', 'beritaList', 'id']));
    }
}
