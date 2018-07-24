<?php

use Illuminate\Support\Facades\Mail;
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
    // return view('welcome');

    $data = [
        'title'=>'Laravel',
        'content'=>'This is Laravel'
    ];

    Mail::send('emails.test', $data, function($message)
    {
        $message->to('lethisaputri@gmail.com', 'Doni')->subject('Hai Mail');

    });

});
