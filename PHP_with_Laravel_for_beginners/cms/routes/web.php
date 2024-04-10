<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
use App\Http\Controllers\PostController;
use Carbon\Carbon;



// use App\Http\Controllers\PostController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/post/{id}/{name}', function ($id, $name) {
//     return "This is post number ". $id . " " . $name;
// });

// Route::get('admin/posts/example', array('as'=>'admin.home', function () {
//     $url =route('admin.home');

//     return "this url is ". $url;
// }));


// Route::get('/post', 'App\Http\Controllers\PostController@index');

// Route::get('/contact','App\Http\Controllers\PostController@contact');

// Route::get('post/{id}/{name}/{password}', 'App\Http\Controllers\PostController@show_post');

/*
|--------------------------------------------------------------------------
| DATABASE RAW SQL QUERIES
|--------------------------------------------------------------------------
*/

Route::get('/insert', function () {
    DB::insert('INSERT INTO posts(title, body) VALUES(?, ?)', ['PHP with Laravel', 'Laravel example php ']);
});

Route::get('/read', function () {
    $results = DB::select('SELECT * FROM posts WHERE id = ?', [1]);

    return $results[0]->title;
});

Route::get('/update', function () {
    $updated = DB::update('UPDATE posts SET title = "new update" WHERE id = ?', [1]);

    return $updated;
});

// Route::get('/delete', function(){
//     $deleted = DB::delete('DELETE FROM posts WHERE id = ?', [1]);

//     return $deleted;
// });


/*
|--------------------------------------------------------------------------
| Application routes.
|--------------------------------------------------------------------------
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
*/

Route::group(['middleware' => ['web']], function () {
});



/*
|--------------------------------------------------------------------------
| ELOQUENT -- ORM (Object Relational Model)
|--------------------------------------------------------------------------
*/

Route::get('/read', function () {

    $posts = Post::all();

    foreach ($posts as $post) {
        return $post->title;
    }
});

Route::get('/find', function () {

    $post = Post::find(3);

    return $post->title;
});

Route::get('/findwhere', function () {

    $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();

    return $posts;
});

Route::get('findmore', function () {

    $posts = Post::findOrFail(2);

    return $posts;
});


Route::get('/basicinsert', function () {

    $post = Post::find(5);

    $post->title = 'changes';
    $post->body = 'chnages';

    $post->save();
});

Route::get('/create', function () {
    Post::create(['title' => 'psssss', 'body' => 'games']);
});

Route::get('/update', function () {
    Post::where('id', 4)->where('is_admin', 0)->update(['title' => 'assoc array', 'body' => 'contents']);
});

Route::get('/delete', function () {
    Post::where('', ' ')->delete();

    //or 
    // $post = Post::find(3);
    // $post->delete();

    //or
    //Post::destroy(3);

    //or for multiple 
    //Post::destroy([3,4]);

});

Route::get('/softdelete', function () {

    Post::find(3)->delete();
});

Route::get('/readsoftdelete', function () {

    // $post = Post::find(2);
    // return $post;

    // $post = Post::withTrashed()->where('id', 2)->get();

    // return $post;

    $post = Post::onlyTrashed()->where('is_admin', 0)->get();

    return $post;
});

Route::get('/restore', function () {

    Post::withTrashed()->where('is_admin', 0)->restore();
});

Route::get('/forcedelete', function () {
    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
});


/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships
|--------------------------------------------------------------------------
*/

// One to One relationship
// return $this->hasOne('App\Phone', 'foreign_key', 'local_key');

Route::get('/user/{id}/post', function ($id) {
    return User::find($id)->post->title;
});

//One to One Inverse relationshipp
// return $this->belongsTo('App\User', 'local_key', 'parent_key');

Route::get('/post/{id}/user', function ($id) {
    return Post::find($id)->user->name;
});

//One to Many Relationship
// Route::get('/posts', function(){
//    $user =  User::find(1);

//    foreach($user->posts as $post){   
//     echo $post->title . "<br>";
//    }
// });

//Many to Many Relationship.
Route::get('/user/{id}/role', function ($id) {

    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

    return $user;

    // foreach($user->roles as $role){
    //     return $role->name;
    // }
});

// Accessing the pivot table 

Route::get('/user/pivot', function () {
    $user = User::find(1);

    foreach ($user->roles as $role) {
        return $role->pivot->created_at;
    }
});

Route::get('/user/country', function () {

    $country = Country::find(4);

    foreach ($country->posts as $post) {
        return $post;
    }
});

// Polymorphic Relations 

// Route::get('user/photos', function(){

//     $user = User::find(1);

//     foreach($user->photos as $photo){
//         return $photo;
//     }
// });

// Route::get('post/{id}/photos', function($id){

//     $post = Post::find($id);

//     foreach($post->photos as $photo){
//         echo $photo->path . "<br>";
//     }
// });

Route::get('/photo/{id}/post', function ($id) {

    $photo = Photo::findOrFail($id);

    return $photo->imageable;
});

// Polymorphic Many to Many

// Route::get('/post/tag', function(){

//     $post = Post::find(1);

//     foreach($post->tags as $tag){
//         echo $tag->name;
//     }
// });

Route::get('/tag/post', function () {
    $tag = Tag::find(2);

    foreach ($tag->posts as $post) {
        echo $post->title;
    }
});

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships
|--------------------------------------------------------------------------
*/


Route::group(['middleware' => 'web'], function () {
    Route::resource('/posts', 'App\Http\Controllers\PostController');

    Route::get('/dates', function () {
        $date = new DateTime('+1 week');

        echo $date->format('m-d-Y');
        echo '<br>';

        echo Carbon::now();
    });

    // This is an 'Accessor' it retrieves the data 
    Route::get('/getname', function () {
        $user = User::findOrFail(1);
        echo $user->name;
    });

    // This is a 'Mutator' it sets the data 
    Route::get('/setname', function () {
        $user = User::findOrFail(1);
        $user->name = "Balabing";
        $user->save();
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');