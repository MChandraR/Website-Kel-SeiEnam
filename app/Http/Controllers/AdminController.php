<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\users;

class AdminController extends Controller
{
    public function index(){
        return View('admin.dashboard');
    }

    public function permohonan(){
        return View('admin.permohonan');
    }

    public function loginPage(){
        return View('admin.login');
    }



   
}
