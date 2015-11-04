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

Route::get('/', ['middleware' => 'guest', function () {
    return view('layouts.master');
}]);

Route::group(['middleware' => 'auth'],function(){
	Route::get('/home', function(){
		return view('layouts.home');
	});
	Route::get('/user/logout',array('uses'=>'UserController@userLogout','as'=>'userLogout'));
});

Route::group(['middleware' => 'guest'],function(){
	Route::group(array('before' => 'csrf'),function(){
		Route::post('/user/login', array('uses'=>'UserController@postLogin','as'=>'postLogin'));
	});
});
