<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

Route::filter('api.logs', function()
{
	// $current_version = Route::getRequestedVersion();
	// $device = Input::get("device","default");
	// $user_id = Auth::user()?Auth::user()->id:0;
	// $access_token = Input::get("access_token","");
	// $data = [
	// 	'user_id'=>$user_id,
	// 	'device'=>$device,
	// 	'uri'=>$route->uri(),
	// 	'method'=>$route->getMethods()[0],
	// 	'domain'=>$route->domain(),
	// 	'prefix'=>strval($route->getPrefix()),
	// 	'action_name'=>$route->getActionName(),
	// 	'version'=>$current_version,
	// 	'access_token'=>$access_token,
	// 	'params'=>json_encode(Input::except("device","access_token")),
	// 	'client_ip' => Request::ip(),
	// ];
	// ApiLogHistory::add($data);
});

Route::filter('auth.app', function()
{
	if(! $access_token = Input::header('access-token'))
		return result(false, '参数无效: access-token');

	Session::setId($access_token);
	Session::start();

	if ( ! Sentry::check())
	{
		return result(false, '请登录', 401);
	}

});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		return Redirect::guest('login');
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
