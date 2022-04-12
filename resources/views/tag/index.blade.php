@extends('layouts.master')
@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            @if(session('sukses'))

            @endif
            @if(session('error'))

            @endif
            <div class="row">
</div>

      <br>
<div class="row">
   <div class="col-md-8">
     @foreach($tags as $tag)
       <a href="#" class="btn btn-success btn-sm">{{$tag->name}} ({{$tag->forum->count()}}<small> thread</small>)</a>
     @endforeach
    </div>
       
      
    </div>
 <br>
        </div>
    </div>
</div>

@stop
