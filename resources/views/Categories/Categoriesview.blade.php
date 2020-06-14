@extends('layouts.app')

@section('content')
 
@if(session()->has('sccess'))
<p type="button" class="btn btn-primary btn-lg btn-block">{{ session()->get('sccess')   }}</p>

@endif 
<br>



 <ul class="list-group">
  <li class="list-group-item active"> Categoriesview  All Categories  . . . 

      <a href="/Categories/create" >
    <button type="button" class="btn btn-success  float-right" > 
    Create Categories     
    </button></a>
  </li>

  <table border="1">
  
  <tbody>
  @foreach($category as $category)
    <tr>
      <td>
        {{$category->name}}
        
        @can('showButton')
        <a href="/Categories/{{$category->id}}/destroy"  class="float-right" > <button type="button" class="btn btn-danger">Delete</button></a>
        @endcan
        <a href="/Categories/{{$category->id}}/edit" class="float-right" > <button type="button" class="btn btn-info">Edit </button></a>
        <a href="/Categories/{{$category->id}}/view" class="float-right" > <button type="button" class="btn btn-info">View </button></a>
       
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