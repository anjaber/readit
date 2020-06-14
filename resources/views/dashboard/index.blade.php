@extends('layouts.app')

@section('content')
 
@if(session()->has('sccess'))
<p type="button" class="btn btn-primary btn-lg btn-block">{{ session()->get('sccess')   }}</p>

@endif 
                 <div class="col-md -15 py-4">
                    <div class="row text_center">
                         <div class="col-md -4 py-4">
                            <div class="card text-white bg-info">
                                <div class=" card-header"> User</div>
                                <div class=" card-body"> {{$user->count()}}</div>
                             </div> 
                        </div>   
                        
                        <div class="col-md -4 py-4">
                            <div class="card text-white bg-danger">
                                <div class=" card-header"> post</div>
                                <div class=" card-body"> {{$post->count()}}</div>
                             </div> 
                        </div> 

                        <div class="col-md -4 py-4">
                            <div class="card text-white bg-success">
                                <div class=" card-header"> category</div>
                                <div class=" card-body"> {{$category->count()}}</div>
                             </div> 
                        </div> 
                    </div>
      
                            
                 </div>
      
@endsection