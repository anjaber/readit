<?php

namespace App\Http\Controllers;
use App\category;
use App\post;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use function GuzzleHttp\Promise\all;

class CategoriesContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=category::all();
        return view('Categories.Categoriesview')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        

        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        // $request->validate([
        //     'name'=> 'required|unique:categories|max:255'
        // ]);
        $category= new category();
        // $category->name=$request->input('name'); طريقة ثانية لعمل الاضافة 
        // $category->save();

        $category->create([
            'name'=>$request->input('name') ,
            // $category = post::all();

            //     echo $category->post->title;
            // 'post-id'=>post->category()->id(),
        ]
            );


        session()->flash('sccess',' Items added successfully . . .');

        return redirect('/Categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $categoryshow=category::find($id)->posts;
      
        return view('Categories.view')->with('categoryshow',$categoryshow); 


         // $comments = App\Post::find(1)->comments;

        //     foreach ($comments as $comment) {
        //   //
        //     }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       
        $category= category::find($id);
        
       return  view('Categories.edit')->with('category',$category); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        session()->flash('sccess' , ' Category the edit sucsses  '); 
        $category= category::find($id);
        // $category->name=$request->input('name'); طريقة ثانية لعمل التعديل 
        // $category->save();

        $category->update([
            'name'=>$request->input('name') 
        ]);

        return redirect('/Categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= category::find($id);
        $category->delete();
        return redirect('/Categories');
    }
}
