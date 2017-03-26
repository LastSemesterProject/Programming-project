<?php

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
use App\User;
use Illuminate\Support\Facades\Auth;
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('home', array('title' => 'Welcome','description' => '','page' => 'home'));
});


// Authentication routes...
Route::get('auth/login', function () {
    return view('login', array('title' => 'Welcome', 'description' => '', 'page' => 'home'));
});
Route::post('auth/login', function () {
    if (Auth::attempt(['email' => Request::get('email'), 'password' => Request::get('password')])) {
        return view('home', array('title' => 'Welcome', 'description' => '', 'page' => 'home'));
    } else {
        return view('login', array('title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }
});
Route::get('auth/logout', function () {
    Auth::logout();

    return Redirect::away('/');
});


// Registration routes...
Route::post('/register', function () {
    if (Request::isMethod('post')) {
        User::create([
            'name' => Request::get('name'),
            'email' => Request::get('email'),
            'password' => bcrypt(Request::get('password')),
        ]);
    }

    return Redirect::away('auth/login');
}

);


Route::get('/checkout', [
    'middleware' => 'auth',
    'uses' => 'Front@checkout'
]);
