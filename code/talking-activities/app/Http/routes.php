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

Route::get('/login', function () {
    return view('layout.login');
});
Route::get('/welcome',function(){
    return view('layout.welcome');
});

Route::post('system/authentication', 'AuthenticationController@attempt');

Route::post('system/labels', 'LabelController@resolve');
