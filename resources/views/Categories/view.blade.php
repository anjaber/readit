 

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
  @if($categoryshow->count()>0 )
  <table class="table">
  <thead class="thead-dark">
    <tr>
    
      <th scope="col">Title</th>
      <th scope="col">description</th>
      <th scope="col">content</th>
      
    </tr>
    
  </thead>
  <tbody>
  @foreach ($categoryshow as $categoryshows)
 
  <tr>

    
      <td> {{$categoryshows->title}} 
      
    </td>
      <td>
          {{$categoryshows->description}}
         
       </td>
      <td>
          
            {{$categoryshows->content}}
           
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
 


