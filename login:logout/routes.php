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

/* CLOSURE, function without any names  */
Route::get('/', function () {
    return view('welcome');
});

//Route::get('contact', function () {
//    return view('contact');
//});

Route::get('contact', 'PagesController@contact');

Route::get('/home', 'HomeController@index');

Route::auth();


