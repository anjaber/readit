@extends('layouts.app')

@section('content')
          
<div class="col-md-2">
<p>name : {{$message->name}}  </p>
<p>message : {{$message->message}}</p>
</div>

 @endsection
 