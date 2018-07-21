@extends('layouts.app')

@section('content')
<h1>SHOW ALL</h1>
    <ul>
        @foreach($posts as $post)
        <div class="image-container">
            <img src="{{$post->path}}" alt="image" class="img-thumbnail">
        </div>

        <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
@stop

@section('footer')
   

@stop
