<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\users;

use Auth;

class AdminController extends Controller
{
    public function index(){
        $username = Auth::user()->username ?? "";
        return View('admin.dashboard', compact('username'));
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
