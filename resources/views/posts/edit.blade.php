@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">update  posts</div>

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
                        <form method="POST" enctype="multipart/form-data" action="/posts/{{$post->id}}">
                                @csrf 
                                
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Title Post</label>
                                    <input type="text" name="title" value=" {{$post->title}}"
                                    class="form-control" id="formGroupExampleInput" placeholder="Enter name Categories">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">description post</label>
                                    <input type="text" name="description" value="{{$post->description}}"
                                    class="form-control" id="formGroupExampleInput" placeholder="Enter name Categories">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">content post</label>
                                    <input type="text" name="content" value="{{$post->content}}"
                                    class="form-control" id="formGroupExampleInput" placeholder="Enter name Categories">
                                </div>
                                <div class="form-group">
                                    <img src="{{ asset('storage/' . $post->image) }} " style=" width:100%" >  
                                   
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">image post</label>
                                    <input type="file" name="image" 
                                    class="form-control" id="formGroupExampleInput" placeholder="Enter name Categories">
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
                                    


                                <button type="submit" class="btn btn-primary">update</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

        
@endsection