<?php

namespace App\Http\Controllers\Api;
use Laravel\Passport\HasApiTokens;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $valdation=  $request->validate([

            'email'=>'required|email',
            'password'=>'required|password',
        ]);


        $login =[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

     if(Auth::attemp($login)){
            $user=Auth::find(1);
            $token = $user->createToken('api access')->accessToken;
          //  $token = $user->createToken('My Token', ['place-orders'])->accessToken;
             
     return response([
        'status'=>'success',
        'message'=> $token ,
    ]);
     }


     
     return response([
        'status'=>'error',
        'message'=>"auth fails" ,
    ]);

        
    }

}
