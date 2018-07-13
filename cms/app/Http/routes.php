<?php

use App\Post;
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

Route::get('/softDelete', function ()
    {
        Post::find(1)->delete();
    });