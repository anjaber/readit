<?php

namespace App\Http\Controllers;

use App\category;
use App\Comment;
use App\post;
use App\Tag;
use App\Http\Requests\PostsRequest;
use Exception;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', post::all() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.createpost')->with('categories',category::all())->with('tag',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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


       session()->flash('sccess',' The post Items added successfully . . .');

       return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->with('post',$post)->with('category',category::all())->with('comment', $post->comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=post::find($id);
        return view('posts.edit')->with('post',$post)->with('categories',category::all())->with('tag',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
       return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post= post::find($id);
        // $post->delete();
        // session()->flash('sccess',' The post Items delete successfully . . .');
        // return redirect('/posts');
        $post= post::withTrashed()->where('id',$id)->first();
        if($post->trashed()){
            $post->forceDelete();
            session()->flash('sccess',' The post Items delete successfully . . .');
             return redirect('/posts');
        }else{
           $post->delete(); 
           session()->flash('sccess',' The post Items delete successfully . . .');
            return redirect('/posts');
        }
    }

    public function trashed(){
        $post=post::onlyTrashed()->get();

        return view('posts.trashed')->with('posts' ,$post);
    }

    public function viewallpost(){

        return view('posts.viewall')->with('post' ,post::all());
    }


    public function createcomment(Request  $request){
      $comment=new Comment();
      try {
        $comment::create([ 
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'website'=> $request->input('website'),
            'message'=> $request->input('message'),
            'post_id'=> $request->input('post_id'),
           
        ]);
        $comment->save();
        return redirect('/posts/{{$comment->post_id}}/show')->with('message','The comment was sent successfully'); 

    } catch (Exception $e) {
        
        return redirect('/posts/views')->with('message','The comment was sent successfully'); 
    }
      
        
        
        //return redirect()->route();
    }

}
