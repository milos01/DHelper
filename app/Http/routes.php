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
	Route::get('/generateGUID',array('uses'=>'HelperController@guidGenerator','as'=>'guidGenerator'));
	Route::get('/stringToHash',array('uses'=>'HelperController@stringToHash','as'=>'stringToHash'));
	Route::get('/user/logout',array('uses'=>'UserController@userLogout','as'=>'userLogout'));
	Route::get('/add/user',array('uses'=>'AdminController@addUser','as'=>'addUser'));
	Route::get('/manage/users',array('uses'=>'AdminController@manageUsers','as'=>'manageUsers'));
	Route::get('/make/admin/{id}',array('uses'=>'AdminController@makeAdmin','as'=>'makeAdmin'));
	Route::get('/downgrade/{id}',array('uses'=>'AdminController@downgrade','as'=>'downgrade'));
	Route::get('/guidToHex',array('uses'=>'HelperController@guidToHex','as'=>'guidToHex'));
	Route::get('/guidToHex/gth',array('uses'=>'HelperController@gth','as'=>'gth'));
	Route::get('/stringToHash/hss',array('uses'=>'HelperController@hss','as'=>'hss'));
	Route::get('/generateGUID/gg',array('uses'=>'HelperController@gguid','as'=>'gguid'));
	Route::post('/user/create', array('uses'=>'AdminController@createUser','as'=>'createUser'));
});

Route::group(['middleware' => 'guest'],function(){
	Route::group(array('before' => 'csrf'),function(){
		Route::post('/user/login', array('uses'=>'UserController@postLogin','as'=>'postLogin'));
	});
});
