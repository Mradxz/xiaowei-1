<?php namespace api\app\v1;

use Input, User, Sentry, Session;

class AuthController extends \BaseController {

	/**
	 * 登录
	 * @return [type] [description]
	 */
	public function login()
	{
		// Login credentials
	    $credentials = array(
	        'phone'    => Input::get('phone', ''),
	        'password' => Input::get('password', ''),
	    );
	    
	    // Authenticate the user
	    $user = Sentry::authenticate($credentials, false);

		$access_token = Session::getId();

		return result(true, compact('access_token'));
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
