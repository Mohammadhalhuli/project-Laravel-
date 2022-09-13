<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ControllerAuth extends Controller{

    public function register(Request $req){

            $validator=Validator::make($req->all(),[
                'name'=>'required|string|max:200',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:30|confirmed',
                'access_token'=>'required'
            ]);
            if($validator->fails()){
                return response()->json([
                    'masege'=>$validator->errors(),
                ]);
            }
            $req->password=bcrypt($req->password);
            $user=User::create([
                'name'=>$req->name,
                'email'=>$req->email,
                'password'=>$req->password,
                'access_token'=>Str::random(10),

            ]);//'access_toke'=>,$req->access_toke
            Auth::login($user);
            return response()->json(['msg'=>'registared successfully',
                                        'access_toke'=>$req->access_token,
                            ]);
    }
    public function login(Request $req){
        $validator=Validator::make($req->all(),[
            'email'=>'required|email',
            'password'=>'required|min:6|max:30'
        ]);
        if($validator->fails()){
            return response()->json([
                'masege'=>$validator->errors(),
            ]);
        }
        $user=User::where('email','=',$req->email)->first();
        $passwordcorrect=Hash::check($req->password,$user->password);
        if($user!=null){
            if($passwordcorrect){
                return response()->json(['msg'=>'Done',]);
            }else{
                return response()->json(['msg'=>'not correct',]);
            }
        }else{
            return response()->json(['msg'=>'not correct',]);
        }
    }
    public function logout(Request $req){
        $access_token=$req->header('access_token');
        $user=User::where('access_token','=',$access_token)->first();
        $user->update([
            'access_token'=>null
        ]);
        return response()->json(['msg'=>'Done',]);
    }
}
