
@extends('layouts.app')

@section('content')
 
@if(session()->has('sccess'))
<p type="button" class="btn btn-primary btn-lg btn-block">{{ session()->get('sccess')   }}</p>

@endif 
@if(session('message'))
<span class="alert alert-danger" style="color: salmon;"> {{session('message')}}</span>

@endif
<br>
 <ul class="list-group ">
        <li class="list-group-item active btn btn-success  float-right">   
            All Message  
        </li>
        @if($message->count()>0 )
            <table class="table ">
            <thead class="thead-dark">
                <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">subject</th>
                <th scope="col">Action</th>
                
                </tr>
                
            </thead>
            <tbody>
      @foreach($message as $message)
            
            <tr>

                <td>
                         {{$message->name}}  
                
                </td>
               <td>
                     {{$message->email}} 
                
                </td>
                <td>
                    {{$message->subject}}
                    
                </td>
               <td>
               <a href="message/{{$message->id}}/view" class="float-right" > <button type="button" class="btn btn-info">ViewMessage </button></a>
             <br>  <a href="message/{{$message->id}}/delete"  class="float-right" > <button type="button" class="btn btn-danger">Delete</button></a>
                    
                </td>
                </tr>
                
              
            
                
      @endforeach
            
            </tbody>
            </table>
@else
                 <div class="col-md -4 py-4">

                            <main class="py-8 card-body   ">
                             <h1 class="text-center"> Not Message yet </h1> 
                            </main>
                 </div>
      
@endif
 
 
  
    
     



  
  <!--
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>-->
</ul>

@endsection