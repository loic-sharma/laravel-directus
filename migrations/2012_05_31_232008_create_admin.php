<?php

class Directus_Create_Admin {

	/**
	 * Start the Directus bundle to allow this migration to utilize
	 * the bundle's models.
	 *
	 * @return void
	 */
	public function __construct()
	{
		Bundle::start('directus');
	}

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		$admin = new Directus\User;

		$admin->email = 'admin@gmail.com';
		$admin->password = 'password';
		$admin->first_name = 'Bob';
		$admin->last_name  = 'Marley';
		$admin->description = 'Admin';

		$admin->save();
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		$admin = Directus\User::where('email', '=', 'admin@gmail.com');

		$admin->delete();
	}

}