<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    //
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            "name"=>"required|string|max:100",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|string|min:6|confirmed"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg"=>$validator->errors()
            ]);
        }
        $password = bcrypt($request->pasword);
        $user =User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$password,
        ]);

        return response()->json([
            "msg"=>"register created successfly",
            "user"=>$user
        ]);
    }

    public function login(Request $request){
        $validator = validator($request->all(),[
            "email"=>"required|email",
            "password"=>"required|string"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "msg"=>$validator->errors()
            ]);
        }
        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password])){
            $user = Auth::user();
            return response()->json([
                "access_token"=>$user->createToken('users')->plainTextToken,
                "token_type"=>'Bearer'
            ]);
        }else {
            return response()->json([
                "msg"=>"user not found"
            ]);
        }
    }
    public function logout(Request $request){
        $user=$request->user();
        $user->tokens()->delete();
        return response()->json([
            "msg"=>"logout successfuly"
        ]);
    }
}
