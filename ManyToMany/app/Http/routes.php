<?php


Use App\User;
Use App\Role;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    
    $user = User::find(2);

    $role = new Role(['name'=>'admin']);

    $user->roles()->save($role);

});

Route::get('/read', function () {
    
    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        return $role;
    }
});

Route::get('/update', function () {
    
    $user = User::findOrFail(1);

    if ($user->has('roles')) {
        foreach ($user->roles as $role) {
            if ($role->name == 'administrator') {
                $role->name = strtoupper("administrator");

                $role->save();
            }
        }
    }

});

Route::get('/delete', function () {
    
    $user = User::findOrFail(2);

    // delete refer pivot
    // $user->roles()->delete();

    foreach ($user->roles as $role) {
        $role->whereId(2)->delete();
    }
});

// attach role to user
Route::get('/attach', function () {
    
    $user = User::findOrFail(1);

    $user->roles()->attach(2);
});

// detach role from user
Route::get('/detach', function () {
    
    $user = User::findOrFail(1);

    $user->roles()->detach(2);
});

// sync
Route::get('/sync', function () {
    
    $user = User::findOrFail(2);

    $user->roles()->sync([3,1]);

    
});