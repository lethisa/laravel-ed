<?php

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;
use App\Video;

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

// pass parameter
// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return "This is post number ". $id . " $name";
// });

// naming routes + nickname
// Route::get('/admin/posts/example', array('as'=>'admin.home', function () {
//     $url = route('admin.home');
//     return "This url is". $url;
// }));

// connect controller + route
// Route::get('/post/{id}', 'PostController@index');

// special route - CRUD
// Route::resource('posts', 'PostController');

// Route::get('/contact', 'PostController@contact');

// Route::get('post/{id}/{name}/{password}', 'PostController@showPost');


// Insert Database
// Route::get('/insert', function () 
//     {
//         DB::insert('INSERT INTO posts (title, content) VALUES (?, ?)', ['PHP Title', 'PHP Content']);
//     });

// Read Database
// Route::get('/read', function()
//     {
//         $results = DB::select('SELECT * FROM posts WHERE id = ?', [1]);

//         foreach ($results as $post) {
//             return $post->title;
//         }

//         return var_dump($results);
//     });

// Update Database
// Route::get('/update', function ()
//     {
//         $updated = DB::update('UPDATE posts SET title = "PHP Title New" WHERE id = ?', [1]);
//
//         return $updated;
//     });

// Delete Data
// Route::get('/delete', function () 
//     {
//         $deleted = DB::delete('DELETE FROM posts WHERE id = ?', [1]);

//         return $deleted;
//     });

// ELOQUENT - ORM
// Route::get('/find', function ()
//     {
//         // $posts = Post::all();

//         // foreach ($posts as $post) {
//         //     return $post->title;
//         // }

//         $posts = Post::find(2);
//         return $posts->title;
//     });

// Route::get('/find', function () 
//     {
//         $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
//         return $posts;
//     });

// Route::get('/find', function () 
//     {
//         // $posts = Post::findOrFail(1);
//         // return $posts;

//         $posts = Post::where('users_count', '<', 50)->firstOrFail();
//         return $posts;
//     });

// Route::get('/basicInsert', function ()
//     {
//         $post = new Post;

//         $post->title = 'New ORM Title';
//         $post->content = 'Content for ORM';

//         $post->save();
//     });

// Route::get('/basicInsert2', function ()
//     {
//         $post = Post::find(2);

//         $post->title = 'New Title';
//         $post->content = 'Content for 2';

//         $post->save();
//     });

// Route::get('/create', function ()
//     {
//         Post::create(['title'=>'Created Title', 'content'=>'Created Content']);

//     });

// Route::get('/update', function ()
//     {
//         Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'New PHP2', 'content'=>'New']);
//     });

// Route::get('/delete', function ()
//     {
//         $post = Post::find(2);
//         $post->delete();
//     });

// Route::get('/delete2', function ()
//     {
//         Post::destroy([4, 5]);

//         // Post::where('is_admin', 0)->delete();
//     });

// soft delete
// Route::get('/softDelete', function ()
//     {
//         Post::find(2)->delete();
//     });

// Route::get('/readSoftDelete', function ()
//     {
//         // $post = Post::find(1);
//         // return $post;

//         $post = Post::withTrashed()->where('id', 1)->get();
//         return $post;

//         // $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//         // return $post;
//     });

// restore delete
// Route::get('/restore', function ()
//     {
//         Post::withTrashed()->where('is_admin', 0)->restore();
//     });

// permanent delete
// Route::get('/forceDelete', function ()
//     {
//         // Post::withTrashed()->where('id', 1)->forceDelete();

//         // Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
//     });


// Eloquent Relationship
// One to One
// Route::get('/user/{id}/post', function ($id)
//     {
//         return User::find($id)->post->title;

//     });

// inverse relation
// Route::get('/post/{id}/user', function ($id)
//     {
//         return Post::find($id)->user->name;
//     });

// One to Many
// Route::get('/posts', function ()
//     {
//         $user = User::find(1);

//         foreach($user->posts as $post)
//         {
//             echo $post->title;
//         }
//     });

// Many to Many
// Route::get('/user/{id}/role', function ($id)
//     {
//         $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

//         return $user;

//         // foreach ($user->roles as $role) {
//         //     return $role->name;
//         // }
//     });

// Access Intermidiate Table / pivot
// Route::get('/user/pivot', function ()
//     {
//         $user = User::find(1);

//         foreach($user->roles as $role)
//         {
//             echo $role->pivot->created_at;
//         }

//     });

// has many throught relation
// Route::get('/user/country', function ()
//     {
//         $country = Country::find(2);

//         foreach($country->posts as $post)
//         {
//             return $post->title;
//         }
//     });

// Polymorphic Relations

// Route::get('/user/photos', function ()
//     {
//         $user = User::find(1);

//         foreach($user->photos as $photo)
//         {
//             echo $photo->path;
//         }
//     });

// Route::get('/post/photos', function ()
//     {
//         $post = Post::find(2);

//         foreach($post->photos as $photo)
//         {
//             echo $photo->path;
//         }
//     });

// Polymorphic Inverse
// Route::get('/photo/{id}/post', function ($id)
//     {
//         $photo = Photo::findOrFail($id);

//         return $photo->imageable;
//     });

// Polymorphic Many to Many
// Route::get('/post/tag', function ()
//     {
//         $post = Post::find(2);

//         foreach($post->tags as $tag)
//         {
//             echo $tag->name;
//         }
//     });

// Route::get('/tag/post', function ()
//     {
//         $tag = Tag::find(1);

//         foreach($tag->posts as $post)
//         {
//             return $post->title;
//         }

//     });

// Route::get('/tag/video', function ()
//     {
//         $tag = Tag::find(1);

//         foreach($tag->videos as $video)
//         {
//             return $video->name;
//         }
//     });

// CRUD - form + validation
Route::resource('/posts', 'PostsController');