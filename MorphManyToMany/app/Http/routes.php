<?php

use App\Video;
use App\Post;
use App\Tag;
use App\Taggable;
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

    $post = Post::create(['name'=>'new post']);
    
    $tag1 = Tag::findOrFail(1);
        
    $post->tags()->save($tag1);
    
    $video = Video::create(['name'=>'new video']);

    $tag2 = Tag::find(2);
    
    $video->tags()->save($tag2);

});

Route::get('/read', function () {

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag)
    {
        echo $tag;
    }
});

Route::get('/update', function () {

    // $post = Post::findOrFail(1);

    // foreach($post->tags as $tag)
    // {
    //     return $tag->whereName('tag 1')->update(['name'=>'new tag']);
    // }

    // OR

    // $post = Post::findOrFail(1);
    // $tag = Tag::find(2);

    // $post->tags()->save($tag);

    // OR

    // $post = Post::findOrFail(1);
    // $tag = Tag::find(2);
    // $post->tags()->attach($tag);

    // OR

    $post = Post::findOrFail(1);
    $tag = Tag::find(2);
    $post->tags()->sync([3,4]);

});

Route::get('/delete', function () {
    
    $post = Post::findOrFail(1);

    foreach($post->tags as $tag)
    {
        $tag->whereId(3)->delete();
    }

});
