<?php

class Directus_Add_Installation_Log {

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
		$log = new Directus\Log;

		$log->type    = 'installed';
		$log->user_id = Directus\User::where('description', '=', 'Admin')->first()->id;

		$log->save();
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Directus\Log::where('type', '=', 'installed')->delete();
	}

}