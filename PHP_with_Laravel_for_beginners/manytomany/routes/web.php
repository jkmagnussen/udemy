<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

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

    // find the user which the role should be associable to 
    $user = User::find(1);

    // instantiate a new Role with an assoc array 
    $role = new Role(['name'=>'Author']);

    // access the roles method throught the user model and place the $instantiated $role variable inside of the roles save method 
    $user->roles()->save($role);
});

Route::get('/read',  function(){

    $user = User::findOrFail(1);

    foreach ($user->roles as $role){
        echo $role->name;
    }
});

Route::get('/update', function(){

    $user = User::findOrFail(1);

    // My attempt 
    // $user->roles()->whereId()->update([''=>'']);

    if($user->has('roles')){

        foreach($user->roles as $role){
            
            if($role->name == 'Administrator'){
                $role->name = 'subscriber';
                $role->save();
            }
        }
    }
});

Route::get('/delete', function(){

    $user = User::findOrFail(1);

    // $user->roles()->delete();

    foreach($user->roles as $role){
        $role->whereId(5)->delete();
    }

});
 
// This attaches a role to a user, if it's not already attached it will vreate a new attachment in the database, so role_user would be added with the pivot data

Route::get('/attach', function(){

    $user = User::findOrFail(1);
    $user->roles()->attach(7);
});

// detach does the opposite, however if you leave the method emty - detach() it will detach all data in role_user 

Route::get('/detach', function(){

    $user = User::findOrFail(1);
    $user->roles()->detach();
});

Route::get('/sync', function(){
    $user = User::findOrFail(1);
    
    $user->roles()->sync([4]);
});