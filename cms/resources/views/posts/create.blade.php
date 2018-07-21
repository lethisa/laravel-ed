@extends('layouts.app')

@section('content')
<h1>CREATE</h1>
    <form action="/posts" method="POST">
        <input type="text" name="title" placeholder="enter title">
        {{csrf_field()}}
        <input type="submit" name="submit">
    </form>
@stop

@section('footer')
   

@stop
