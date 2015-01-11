<?php 

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);

	if(Request::isJson() || strpos(Input::header('accept'), 'json'))
	{
		return result(false, $exception->getMessage(), $code);
	}
});

App::missing(function($exception)
{
    // return Response::view('errors.missing', array(), 404);
});