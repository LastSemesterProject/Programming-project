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
    return view('home', array('title' => 'Welcome', 'description' => '', 'page' => 'home'));
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('dashboard', 'Controller@getDashboard')->middleware('auth');


Route::get('/submit-form', ['as' => 'submit-form', 'uses' => 'ProductController@addItem']);


Route::get('/find-item', ['as' => 'find-item', 'uses' => 'ProductController@findItem']);

Route::get('/submit-profile', ['as' => 'submit-profile', 'uses' => 'ProductController@submitProfile']);


Route::controllers([
    'password' => 'Auth\PasswordController',
]);

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'Controller@getProfile');

Route::get('/user-list', 'Controller@getUserList');

Route::get('admin/profile', ['middleware' => 'admin', function () {
    //
}]);

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin', 'Controller@getAdminProfile');
});

Route::post('/home/{products}','ProductController@saveResult');