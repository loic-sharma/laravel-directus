<?php

class Directus_Home_Controller extends Directus_Controller {

	/**
	 * Show the Dashboard page.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$backups = count(glob(path('storage').DS.'directus'.DS.'backups'.DS.'*'));

		$this->layout->nest('content', 'directus::home.index', compact('backups'));
	}

	public function get_inbox()
	{
		$this->layout->nest('content', 'directus::pages.home.inbox');
	}
}