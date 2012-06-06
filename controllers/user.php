<?php

class Directus_User_Controller extends Directus_Controller {

	public $layout = 'directus::layouts.login';

	/**
	 * Show the login form.
	 *
	 * @return void
	 */
	public function get_login()
	{
		$this->layout->nest('content', 'directus::user.login');		
	}

	/**
	 * Attempt to log the user in.
	 *
	 * @return Laravel\Redirect
	 */
	public function post_login()
	{
		$rules  = array(
			'email' => 'required',
			'password' => 'required',
		);

		$validation = Validator::make(Input::all(), $rules);

		if($validation->valid())
		{
			$email    = Input::get('email');
			$password = Input::get('password');

			if(Directus\Auth::attempt(compact('email', 'password')))
			{
				return Redirect::to('directus');
			}

			else
			{
				$validation->errors->add('login', 'Invalid Credentials.');
			}
		}

		return Redirect::to('directus/login')->with_errors($validation->errors);
	}

	public function action_forgot()
	{
		
	}

	/**
	 * Log the user out.
	 *
	 * @return Laravel\Redirect
	 */
	public function get_logout()
	{
		Directus\Auth::logout();

		return Redirect::to('directus/login');
	}
}