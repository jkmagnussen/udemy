<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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
    return view('welcome');
});

// CRUD (Create, Read, Update, Delete) 

Route::get('/create', function(){

    $user = User::findOrFail(1);
    $user->posts()->save(new post(['title'=>'testing project 2','body'=>'second test for CRUD create route']));
});

// Comment logic - after setting up relationship in model for elequent foreign key abstraction, i recall that the post access method(which is the many of "oneToMany" on users, users being the one) is from the User model. Once i have access to the User model, i can simply call the method $user->posts from this in a loop. 

Route::get('/read', function(){
    $user = User::findOrFail(1);

    foreach ($user->posts as $post){
        echo $post . "<br>";
    }
});

Route::get('/update', function(){

    $user = User::find(1);

    $user->posts()->whereId(1)->update(['title'=>'changed title test']);
});

Route::get('/delete', function(){

    $user = User::find(1);

    $user->posts()->whereId(2)->delete();
});