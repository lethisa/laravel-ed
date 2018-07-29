@extends('layouts.admin')


@section('content')

<h1>Comment</h1>

@if(count($comments) > 0)

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Comment</th>
      <th scope="col">Author</th>
      <th scope="col">Email</th>
      <th scope="col">Post Related</th>
      <th scope="col">Created</th>
      <th scope="col">Reply</th>
      
    </tr>
  </thead>
  <tbody>

@if($comments)

    @foreach($comments as $comment)
    <tr>
      <th scope="row">{{$comment->id}}</th>
      <th scope="row">{{$comment->body}}</th>
      <th scope="row">{{$comment->author}}</th>
      <th scope="row">{{$comment->email}}</th>
      <th scope="row"><a href="{{route('home.post', $comment->post->id)}}">View Post</a></th>
      <td>{{$comment->created_at ? $comment->created_at->diffForHumans() : 'no date'}}</td>
      <td>
        <a href="{{route('admin.comment.replies.show', $comment->id)}}">Reply</a>
      </td>
      <td>

        @if($comment->is_active == 1)
        
            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
            {{csrf_field()}}

            <input type="hidden" name="is_active" value="0">

            <div class="form-group">
                {!! Form::submit('Unapprove Comment', ['class'=>'btn btn-primary']) !!}
            </div>
         
            {!! Form::close() !!}
        @else
             {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
            {{csrf_field()}}

            <input type="hidden" name="is_active" value="1">

            <div class="form-group">
                {!! Form::submit('Approve Comment', ['class'=>'btn btn-success']) !!}
            </div>
         
            {!! Form::close() !!}
        @endif
      </td>

      <td>
        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::submit('Delete Comment', ['class'=>'btn btn-danger']) !!}
        </div>
        
        {!! Form::close() !!}
      </td>

    </tr>
    @endforeach
 @endif

  </tbody>
</table>

@else
    <h1 class="text-center">No Comments</h1>
@endif

@stop