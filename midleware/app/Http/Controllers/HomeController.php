<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     // session
    public function index(Request $request)
    {
        // set session
        // $request->session()->put(['ada'=>'apa']);
        // or
        // session(['a'=>'b']);

        // delete session
        // $request->session()->forget('a');

        //delete all
        // $request->session()->flush();

        // return session('a');

        // return $request->session()->all();
        
        // return view('home');


        // flash session
        // $request->session()->flash('message', 'success');

        return $request->session()->get('message');

        // reflash + keep
    }
}
