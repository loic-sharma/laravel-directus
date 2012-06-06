<?php namespace Directus\Auth;

class Driver extends \Laravel\Auth\Drivers\Driver {

	/**
	 * Get the current user of the application.
	 *
	 * If the user is a guest, null should be returned.
	 *
	 * @param  int         $id
	 * @return mixed|null
	 */
	public function retrieve($id)
	{
		if (filter_var($id, FILTER_VALIDATE_INT) !== false)
		{
			return \Directus\User::find($id);
		}
	}

	/**
	 * Attempt to log a user into the application.
	 *
	 * @param  array  $arguments
	 * @return void
	 */
	public function attempt($arguments = array())
	{
		extract($arguments);

		$user = \Directus\User::where('email', '=', $arguments['email'])->first();

		// This driver uses a basic username and password authentication scheme
		// so if the credentials match what is in the database we will just
		// log the user into the application and remember them if asked.
		if ( ! is_null($user) and \Hash::check($arguments['password'], $user->password))
		{
			return $this->login($user->id, array_get($arguments, 'remember'));
		}

		return false;
	}
}