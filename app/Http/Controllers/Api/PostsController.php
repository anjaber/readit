<?php

namespace App\Http\Controllers\Api;
use App\post;
use App\Http\Requests\PostsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostRessources;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    
    public function index()
    {
                $post= post::all() ;

                return response([
                    'status'=>'success',
                    'data'=>$post
                ]);
    }

    
    public function store(PostsRequest $request)
    {
       $post=new post();
      $image= $request->image->store('images','public');
      //dd( $image);
       $poststore= $post->create([
           'title'=>$request->input('title'),
           'description'=>$request->input('description'),
           'content'=>$request->input('content'),
           'image'=> $image,
           'category_id'=>$request->input('CategoryID'),    
       ]);

           if( $request->TagID ){
                 $poststore->tags()->attach($request->TagID);
        
                }


    

        return response([
        'status'=>'success',
        'data'=>$post ,
    ]);
    }


    public function show( Post $post)
    {
          return new PostRessources($post);
    }

  
    public function update(PostsRequest $request, $id)
    {
       $post=post::find($id);
       $post->update([
            'title'=>$request->title ,
            'description'=>$request->description ,
            'content'=> $request->content ,
            'image'=> $request->image ,
       ]);
       session()->flash('sccess',' The post Items update successfully . . .');
       
       return response([
        'status'=>'success',
        'data'=>$post ,
    ]);

    }

   
    public function destroy($id)
    {
        
        $post= post::withTrashed()->where('id',$id)->first();
        if($post->trashed()){
            $post->forceDelete();
            session()->flash('sccess',' The post Items delete successfully . . .');
             return redirect('/posts');
        }else{
           $post->delete(); 
           session()->flash('sccess',' The post Items delete successfully . . .');
           
           return response([
            'status'=>'success',
            'data'=>$post ,
        ]);
    
        }
    }


   
}
