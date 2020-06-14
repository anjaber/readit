@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New posts</div>

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
                        <form method="POST"   enctype="multipart/form-data" action="/posts/create">
                                @csrf 
                                
                                <div class="form-group">
                                    <label for="formGroupExampleInput">PostTitle </label>
                                    <input type="text" name="title"
                                    class="form-control" id="formGroupExampleInput" placeholder="Enter Post Title">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Post Description </label>
                                    <textarea class="form-control" rows="5" id="comment" name="description" 
                                    placeholder="Enter Post description"></textarea>

                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Post Content </label>
                                    <textarea class="form-control" rows="5" id="comment" name="content" 
                                    placeholder="Enter  Post Content"></textarea>
                                
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Post Image </label>
                                    <input type="file" name="image" 
                                    class="form-control-file" id="formGroupExampleInput" placeholder="Enter Post Image">
                                </div>

                                
                                <div class="form-group">
                                    <label for="SelectCategory"> Select CategoryAddress</label>
                                    <select name="CategoryID" class="form-control" id="exampleFormControlSelect1">
                                    <option  selected hidden > CategoryAddress </option>
                                    @foreach($categories as $category )
                                    <option  value="{{$category->id }}" >   {{$category->name }} </option>
                                    @endforeach
                                    
                                    </select>
                                </div>
                                @if(! $tag->count() <= 0)
                                    <div class="form-group">
                                        <label for="SelectTag"> Select a Tag</label>
                                        <select name="TagID[]" class="form-control" id="exampleFormControlSelect1" 
                                        multiple>
                                        <option  selected hidden > Tag </option>
                                        @foreach($tag as $tag )
                                        <option  value="{{$tag->id }}" >   {{$tag->name }} </option>
                                        @endforeach
                                        
                                        </select>
                                    </div>
                                  @endif  
                                    
                                <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

        
@endsection