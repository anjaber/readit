<?php

namespace App\Http\Controllers;

use App\Massage;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PagesController extends Controller
{
    public function pagewellcom() {
        return view('pages.welcome')->with('post',post::all());
    }

    
    public function about() {
        return view('pages.about')->with('post',post::all());
    }
   

    public function  contact() {
        return view('pages.contact');
    }


    public function  store(Request $request) {
        $massege=Massage::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'subject'=>$request->input('subject'),
            'message'=>$request->input('message'),
        ]);
        $massege->save();
       return redirect('/contact')->with('message',"The message was sent successfully ");
        
        
    }

    public function  message() {
        // if(Gate::denies('showMessage')){
        //     abort('304','un authriazation ');
        // }

        return view('pages.viewmessage')->with('message',massage::all());
    } 

    public function messagedelete($id){
            Massage::find($id)->delete();
            return redirect('/message')->with('message','The message was deleted successfully');

    }

    public function messageview($id){
      $message=  Massage::find($id);
      return view('pages.messageview')->with('message',$message);
    }

}
