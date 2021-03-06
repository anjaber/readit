@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit  Categories</div>

                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               

                        <form method="POST" action="/Categories/{{$category->id}}/">
                                @csrf 
                                
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Name Categories</label>
                                    <input type="text" name="name" value=" {{$category->name}}"
                                    class="form-control" id="formGroupExampleInput" placeholder="Enter name Categories">
                                </div>
                                    
                                <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

        
@endsection