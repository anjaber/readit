<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{


    public function index(){
        if(Gate::denies('showMune')){
            abort('304','un authriazation ');
        }
        return view('users.index')->with('user',User::all());
    }
}
