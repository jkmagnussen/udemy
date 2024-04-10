<?php

use Illuminate\Support\Facades\Route;
use App\Models\staff;
use App\Models\Photo;

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


Route::get('/create', function(){

    $staff = Staff::findOrFail(1);
    $staff->photos()->create(['path'=>'T2.jpg']);
});

Route::get('/read', function(){

    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo){
        echo $photo->path . '<br>';
    }
});

Route::get('/update', function(){
    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first(); 
    $photo->path = "updated example.jpg";
    $photo->save();
});

Route::get('/delete', function(){
    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(2)->delete();
});

Route::get('/assign', function(){
    $staff  = Staff::findOrFail(2);
    $photo = Photo::findOrFail(5);
    $staff->photos()->save($photo);
});

Route::get('/un-assign', function(){
    $staff  = Staff::findOrFail(2);
    $photo = Photo::findOrFail(5);

    $staff->photos()->whereId(5)->update(['imageable_id'=>0, 'imageable_type'=>'test']);
});