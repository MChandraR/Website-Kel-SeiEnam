<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class UsersController extends Controller
{
    public function index(){
        $data = users::get();

        return response()->json($data);

    }
}
