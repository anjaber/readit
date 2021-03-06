@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Tag</div>

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
                        <form method="POST" action="/Tags/create">
                                @csrf 
                                
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Name Tags</label>
                                    <input type="text" name="name"
                                    class="form-control" id="formGroupExampleInput" placeholder="Enter name Categories">
                                </div>
                                    
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

        
@endsection