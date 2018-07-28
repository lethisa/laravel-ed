@extends('layouts.admin')


@section('content')

<h1>Categories</h1>

<div class="col-sm-6">

    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store', 'files'=>true]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}

    @include('includes.error')

</div>

<div class="col-sm-6">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Category</th>
        <th scope="col">Created</th>
        </tr>
    </thead>
    <tbody>

    @if($categories)

        @foreach($categories as $category)
        <tr>
        <th scope="row">{{$category->id}}</th>
        <td>{{$category->name}}</td>
        <td>{{$category->created_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    @endif

    </tbody>
    </table>
</div>




@stop