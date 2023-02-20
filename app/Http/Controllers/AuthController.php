<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('authpages.register');
    }
    public function registerform(Request $request){
        $data = $request->validate([
            "name"=>"required|string|max:100",
            "email"=>"required|email|unique:users,email",
            "password"=>"required|string|min:6|confirmed",
        ]);
        $data['password']=bcrypt($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect(url('/home'));
    }

    public function login(){
        return view('authpages.login');
    }
    public function loginform(Request $request){
        $data = $request->validate([
            "email"=>"required|email",
            "password"=>"required|string",
        ]);
        $is_log=Auth::attempt(["email"=>$data['email'],"password"=>$data['password']]);
        if ($is_log != true) {
            return redirect(url('/login'))->withErrors('credintials not correct');
        }
        return redirect(url('/home'));
     }

     public function logout(){
        Auth::logout();
        return redirect(url('/login'));
     }
}
