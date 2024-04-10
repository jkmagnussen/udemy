<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    $data = [
        'title'=>'Hi this is my course title',
        'content'=>'This is my laravel course mail example'
    ];

    Mail::send('emails.test', $data, function($message){

        $message->to('jkmagnussen@outlook.com', 'Joe')->subject('Testing Mailgun');
    });
});