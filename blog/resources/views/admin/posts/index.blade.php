@extends('layouts.admin')


@section('content')

<h1>Posts</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Photo</th>
      <th scope="col">Author</th>
      <th scope="col">Category</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">View Post</th>
      <th scope="col">View Comment</th>
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
    </tr>
  </thead>
  <tbody>

@if($posts)

    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="image"></td>
      <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
      <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
      <td>{{$post->title}}</td>
      <td>{{str_limit($post->body, 10)}}</td>
      <td><a href="{{route('home.post', $post->id)}}">View</a></td>
      <td><a href="{{route('admin.comments.show', $post->id)}}">View</a></td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
    </tr>
    @endforeach
 @endif

  </tbody>
</table>

<div class="row"></div>
  <div class="col-sm-6 col-sm-offset-5">
    {{$posts->render()}}
  </div>
</div>

@stop