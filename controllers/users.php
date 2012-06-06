<?php

class Directus_Users_Controller extends Directus_Controller {

	/**
	 * Show the users page.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$users = Directus\User::get();

		$this->layout->nest('content', 'directus::users.index', compact('users'));
	}
}