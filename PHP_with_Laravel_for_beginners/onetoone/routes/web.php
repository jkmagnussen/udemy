<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// CREATE
Route::get('/insert', function(){
    $user = User::findOrFail(1);
    $address = new Address(['name'=>'1234 Made up laneyjtjyr,e NY 736829']);
    $user->address()->save($address);
});

// READ
Route::get('/read', function(){
    $user = User::findOrFail(1);
    echo $user->address->name;
});

//UPDATE
Route::get('/update', function(){
    $address = Address::whereUserId(1)->first();
    $address->name = "updated testing address";
    $address->save();
});

//DELETE
Route::get('/delete', function(){
    $user = User::findOrFail(1);
    //Here we find the users address and delete it.
    $user->address()->delete();
});