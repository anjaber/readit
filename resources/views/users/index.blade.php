
@extends('layouts.app')

@section('content')
 
@if(session()->has('sccess'))
<p type="button" class="btn btn-primary btn-lg btn-block">{{ session()->get('sccess')   }}</p>

@endif 
<br>



 <ul class="list-group">
        <li class="list-group-item active">   All usrs  . . . 

            <a href="/users/create" >
            <button type="button" class="btn btn-success  float-right" > 
            Create user     
            </button></a>
        </li>
 @if($user->count()>0 )
            <table class="table">
            <thead class="thead-dark">
                <tr>
                
                <th scope="col">name</th>
                <th scope="col">role</th>
                
                
                </tr>
                
            </thead>
            <tbody>
      @foreach($user as $user)
            
            <tr>

                <td>
                     {{$user->name}} 
                
                </td>
                <td>
                    {{$user->role}}
                    
                </td>
              
                </tr>
                
              
            
                
      @endforeach
            
            </tbody>
            </table>
@else
                 <div class="col-md -4 py-4">

                            <main class="py-8 card-body   ">
                             <h1 class="text-center"> Not User yet </h1> 
                            </main>
                 </div>
      
@endif
 
  
    
     



  
  <!--
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>-->
</ul>
@endsection