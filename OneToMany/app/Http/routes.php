<?php

Use App\User;
Use App\Post;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    
    $user = User::findOrFail(1);

    $post = new Post(['title'=>'Laravel 3', 'body'=>'Content 3']);

    $user->posts()->save($post);

});

Route::get('read', function () {
    
    $user = User::findOrFail(1);

    // return $user->posts;

    // dd($user->posts);

    foreach($user->posts as $post)
    {
        echo $post->title;
    }
});

Route::get('update', function () {
    
    $user = User::findOrFail(1);

    $user->posts()->whereId(1)->update(['title'=>'New Title', 'body'=>'New Body']);
    
});

Route::get('delete', function () {
    
    $user = User::findOrFail(1);

    $user->posts()->where('id', 1)->delete();
});