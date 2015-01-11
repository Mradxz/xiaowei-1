<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUser;

class User extends SentryUser{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * 单点登录控制
	 * Checks the given persist code.
	 *
	 * @param  string  $persistCode
	 * @return bool
	 */
	public function checkPersistCode($persistCode)
	{
		// 禁用单点登录
		return true;
	}

}
