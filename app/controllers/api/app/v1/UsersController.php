<?php namespace api\app\v1;

use Input, Sentry;

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function current()
	{
		$user = Sentry::getUser();

		return result(true, compact('user'));
	}

	public function register()
	{

		$user = Sentry::createUser(array(
	        'phone'     => Input::get('phone',''),
	        'password'  => Input::get('password',''),
	        'activated' => true,
	    ));

	    // Find the group using the group id
	    // id:2 为普通用户组
	    $group = Sentry::findGroupById(2);

	    // Assign the group to the user
	    $user->addGroup($group);

	    return result(true, compact('user'));
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
