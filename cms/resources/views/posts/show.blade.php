@extends('layouts.app')

@section('content')
<h1>SHOW</h1>
    <ul>
        <li><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></li>
    </ul>
@stop

@section('footer')
   

@stop
