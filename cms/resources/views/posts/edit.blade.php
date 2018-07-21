@extends('layouts.app')

@section('content')
<h1>EDIT</h1>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('update post', ['class'=>'btn btn-info']) !!}
        </div>
        
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::submit('delete post', ['class'=>'btn btn-danger']) !!}
        </div>
        
    {!! Form::close() !!}

    {{-- <form action="/posts/{{$post->id}}" method="POST">
         {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" value="{{$post->title}}" placeholder="enter title">
        <input type="submit" name="submit" value="UPDATE">
    </form> --}}

    {{-- <form action="/posts/{{$post->id}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="DELETE">
    </form> --}}
@stop

@section('footer')
   

@stop
