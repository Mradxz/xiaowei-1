<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// 非验证方法
Route::api(['version' => 'v1', 'before' => 'api.logs', "prefix" => "api/app", 'namespace'=>'api\app\v1'], function () 
{
	// 不验证方法
	Route::group([], function ()
	{
        Route::post('users/login', 'UsersController@login');
        Route::post('users/register', 'UsersController@register');
    });

	// 验证方法
	Route::group(['before'=>'auth.app'], function ()
	{
        Route::post('users/current', 'UsersController@current');
    });

});

