@extends('layouts.admin')


@section('content')

<h1>Media</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Created</th>
    </tr>
  </thead>
  <tbody>

@if($photos)

    @foreach($photos as $photo)
    <tr>
      <th scope="row">{{$photo->id}}</th>
      <td><img height="50" width="50" src="{{$photo->file}}" alt="image"></td>
      <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
      <td>
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::submit('Delete Media', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
 @endif

  </tbody>
</table>

@stop