<?php

use Illuminate\Support\Facades\Auth;
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

    // other way
    // if (AUth::check()) {
    //     return "The user is logged in";
    // }

    // other way
    // $username = "aaa";
    // $password = "aaa";

    // if (Auth::attempt(['username'=>$username, 'password'=>$password])) {
    //     return redirect()->intended('/admin');
    // }

});

Route::auth();

Route::get('/home', 'HomeController@index');
