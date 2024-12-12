<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\users;
use Auth;

class SessionController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');

        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba login menggunakan credentials
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            // Login berhasil
            if(Auth::user()->role == "admin"){
                Auth::guard('admin')->attempt($credentials);
                return response()->json([
                    "status" => 200,
                    "message" => "Berhasil login sebagai admin !",
                    "data" => NULL
                ]);
            }else{
                Auth::guard('web')->attempt($credentials);
                return response()->json([
                    "status" => 200,
                    "message" => "Berhasil login sebagai user !",
                    "data" => NULL
                ]);
            }
        }

        // Login gagal
        return response()->json([
            "status" => 201,
            "message" => "Username atau password salah !",
            "data" => NULL
        ]);
    }



    public function register(Request $request){
        if((!isset($request->username) && $request->username == "") || (!isset($request->email) && $request->email == "") && (!isset($request->password) && $request->password == "")){
            return response()->json([
                "status" => "error",
                "message" => "Data tidak boleh kosong ",
                "data" => NULL
            ]);
        }

        if(users::where('username',$request->username)->count() > 0){
            return response()->json([
                "status" => "error",
                "message" => "Username telah ada, gunakan username yang unik !",
                "data" => NULL
            ]);
        }

        if(users::where('email',$request->email)->count() > 0){
            return response()->json([
                "status" => "error",
                "message" => "Email telah ada, gunakan email yang unik !",
                "data" => NULL
            ]);
        }

        $user = $this->create($request->all());
        return response()->json([
            "status" => "sukses",
            "message" => "Selamat datang user, silahkan login menggunakan akun yang telah dibuat !",
            "data" => NULL
        ]);
    }

    protected function create(array $data)
    {
        return users::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
