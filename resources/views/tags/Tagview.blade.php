@extends('layouts.app')

@section('content')
 
@if(session()->has('sccess'))
<p type="button" class="btn btn-primary btn-lg btn-block">{{ session()->get('sccess')   }}</p>

@endif 
<br>



 <ul class="list-group">
  <li class="list-group-item active"> Tagsview  All Tags  . . . 

      <a href="/Tags/create" >
    <button type="button" class="btn btn-success  float-right" > 
    Create Tags     
    </button></a>
  </li>

  <table border="1">
  
  <tbody>
  @foreach($tag as $tag)
    <tr>
      <td>
        {{$tag->name}}

        <span class="badge badge-light  btn btn-primary ml-2" > {{$tag->posts()->count() }}</span>
        
        @can('showButton')
<a href="/Tags/{{$tag->id}}/destroy"  class="float-right" > <button type="button" class="btn btn-danger">Delete</button></a>
  @endcan      
<a href="/Tags/{{$tag->id}}/edit" class="float-right" > <button type="button" class="btn btn-info">Edit </button></a>
       <!-- <a href="/Tags/{{$tag->id}}/view" class="float-right" > <button type="button" class="btn btn-info">View </button></a>
-->
      </td>
      
   
    </tr>
    @endforeach

  </tbody>
</table>

    
     



  
  <!--
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>-->
</ul>
@endsection