<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){

        // $request->session()->put(['edwin'=>'instructor']);
        // return view('home');
        // return $request->session()->all();
        // session(['edwin2'=>'our teacher']);
        // return session('edwin');
        // $request->session()->forget('edwin2');
        // $request->session()->flush();

        // return $request->session()->all();

        $request->session()->flash('message', 'Post has been created');

        return $request->session()->get('message');
    }
}