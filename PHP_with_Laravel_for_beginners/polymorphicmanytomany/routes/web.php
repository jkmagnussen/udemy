<?php

use Illuminate\Support\Facades\Route;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Video;

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

    // $post = Post::create(['name'=>'My First Post']);
    // $tag1 = Tag::find(1);
    // $post->tags()->save($tag1);

    // $video = Video::create(['name'=>'video.mov']); 
    // $tag2 = Tag::find(2);
    // $video->tags()->save($tag2);

    $post = Post::create(['name'=>'Testing post']);
    $tag4 = Tag::find(4);
    $post->tags()->save($tag4);
});


Route::get('/read', function(){

    $post = Post::findOrFail(3);
    foreach($post->tags as $tag){
        echo $tag;
    }
});

Route::get('/update', function(){

    $post = Post::findOrFail(3);
    foreach($post->tags as $tag){
        return $tag->whereName('PHP')->update(['name'=>'Updated PHP']);
    }
});

Route::get('/delete', function(){
    $post = Post::findOrFail(4);

    foreach($post->tags as $tag){
        $tag->whereId(4)->delete();
    }

});