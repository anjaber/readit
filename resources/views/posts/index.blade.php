@extends('layouts.app')

@section('content')
 
@if(session()->has('sccess'))
<p type="button" class="btn btn-primary btn-lg btn-block">{{ session()->get('sccess')   }}</p>

@endif 
<br>



 <ul class="list-group">
  <li class="list-group-item active"> postsview  All posts  . . . 

      <a href="/posts/create" >
    <button type="button" class="btn btn-success  float-right" > 
    Create posts     
    </button></a>
  </li>
  @if($posts->count()>0 )
  <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">image</th>
      <th scope="col">Title</th>
      <th scope="col">description</th>
      <th scope="col">content</th>
      <th scope="col">Actions</th>
      
    </tr>
    
  </thead>
  <tbody>
  @foreach($posts as $post)
 
  <tr>

     <td>
          <img src="{{ asset('storage/'.$post->image)  }}" width="100" height="50"  >
    
      
      </td>
      <td> {{$post->title}} 
      
    </td>
      <td>
          {{$post->description}}
         
       </td>
      <td>
          
            {{$post->content}}
           
      </td>
      
      <td>
     
        <a href="/posts/{{$post->id}}/edit" class="float-right" > <button type="button" class="btn btn-info">Edit </button></a>
        @can('showButton')

        <a href="/posts/{{$post->id}}/destroy"  class="float-right" > <button type="button" class="btn btn-danger">Delete</button></a>
    @endcan
      </td>
    </tr>
   
    
    @endforeach
   
  </tbody>
</table>
@else
                 <div class="col-md -4 py-4">

                            <main class="py-8 card-body   ">
                             <h1 class="text-center"> Not post yet </h1> 
                            </main>
                 </div>
      
@endif
 
  
    
     



  
  <!--
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>-->
</ul>
@endsection