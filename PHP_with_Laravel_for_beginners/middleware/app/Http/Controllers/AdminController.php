<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller{
    //

    public function __construct(){
        $this->middleware('isAdmin');
    }

    public function index(){
        return "You are an administrator because you are seeing this page.";
    }
}