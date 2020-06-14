<?php

namespace App\Http\Controllers;

use App\post;
use App\User;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate ;

class DashboardController extends Controller
{
    public function index(){
            if(Gate::denies('showMune')){
                abort('304','un authriazation ');
            }
        return view('dashboard.index')->with('user',User::all())->with('post',post::all())->with('category',category::all());
    }
}
