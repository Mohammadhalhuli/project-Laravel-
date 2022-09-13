<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function registerForm(){
        return view('auth.regForm');
    }
    public function register(Request $req){
        $data=$req->validate([
            'name'=>'required|max:200',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:30|confirmed'
        ]);
        $data['password']=bcrypt($data['password']);
        $user=User::create($data);
        Auth::login($user);
        return redirect(url('cat'));
    }
    public function  loginForm(){
        return view('auth.login');
    }
    public function login(Request $req){
        $data=$req->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:30'
        ]);
        $isLogin=Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);
        if($isLogin!=true){
            return redirect(url('login'))->withErrors("error");
        }
        else{
            return redirect(url('cat'));
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(url('login'));
    }
}
