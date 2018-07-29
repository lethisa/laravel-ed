@extends('layouts.admin')


@section('content')

<h1>Reply</h1>

@if(count($replies) > 0)

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">reply</th>
      <th scope="col">Author</th>
      <th scope="col">Email</th>
      <th scope="col">Post Related</th>
      <th scope="col">Created</th>
    </tr>
  </thead>
  <tbody>

@if($replies)

    @foreach($replies as $reply)
    <tr>
      <th scope="row">{{$reply->id}}</th>
      <th scope="row">{{$reply->body}}</th>
      <th scope="row">{{$reply->author}}</th>
      <th scope="row">{{$reply->email}}</th>
      <th scope="row"><a href="{{route('home.post', $reply->comment->post->id)}}">View Post</a></th>
      <td>{{$reply->created_at ? $reply->created_at->diffForHumans() : 'no date'}}</td>
      
      <td>

        @if($reply->is_active == 1)
        
            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
            {{csrf_field()}}

            <input type="hidden" name="is_active" value="0">

            <div class="form-group">
                {!! Form::submit('Unapprove reply', ['class'=>'btn btn-primary']) !!}
            </div>
         
            {!! Form::close() !!}
        @else
             {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
            {{csrf_field()}}

            <input type="hidden" name="is_active" value="1">

            <div class="form-group">
                {!! Form::submit('Approve reply', ['class'=>'btn btn-success']) !!}
            </div>
         
            {!! Form::close() !!}
        @endif
      </td>

      <td>
        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::submit('Delete Reply', ['class'=>'btn btn-danger']) !!}
        </div>
        
        {!! Form::close() !!}
      </td>

    </tr>
    @endforeach
 @endif

  </tbody>
</table>

@else
    <h1 class="text-center">No replies</h1>
@endif

@stop