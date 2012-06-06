<?php

class Directus_Create_Storage_Folders {

	static $folders = array(
		'temp',
		'files',
		'thumbs',
		'avatars',
		'backups',
	);

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		$directus = path('storage') . 'directus'.DS;

		@mkdir($directus);

		foreach(static::$folders as $folder)
		{
			@mkdir($directus.$folder);
		}
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		File::rmdir(path('storage').'directus');
	}
}