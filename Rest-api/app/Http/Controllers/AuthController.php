<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // fungsi register
    function register(Request $request){
        //menangkap inputan
        $input = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];
        //menginput data ke table user
        $user = User::create($input);

        $data = [
            'message' => 'User is created successfully',
        ];
        return response()->json($data, 200);
    }

    // fungsi login
    function login(Request $request){
        // menangkap inputan user
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        If(Auth::attempt($input)){
            //membuat token
            $token = Auth::user()->createToken('auth_token');

            $data = [
                'message' => 'Login Successfully',
                'token' => $token->plainTextToken
            ];

            //mengembalikan response json
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Email or Password salah'
            ];

            return response()->json($data, 401);
        }

        // mengambil data user didalam database
        // $user = User::where('email', $input['email'])->first();
        // if($user){
        //     // membandingkan input user dengan data user (Db)
        //     $isLoginSuccessfully = ($input['email'] == $user->email && Hash::check($input['password'], $user->password));

        //     if($isLoginSuccessfully){
        //         //membuat token
        //         $token = $user->createToken('auth_token');

        //         $data = [
        //             'message' => 'Login Successfully',
        //             'token' => $token->plainTextToken
        //         ];
        //         return response()->json($data, 200);
        //     }else{
        //         $data = [
        //             'message' => 'Email or Password salah'
        //         ];
        //         return response()->json($data, 401);
        //     }
        // }else{
        //     $data = [
        //         'message' => 'Email or Password salah'
        //     ];
        //     return response()->json($data, 401);
        // }
    }
}
