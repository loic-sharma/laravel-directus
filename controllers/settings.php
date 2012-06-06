<?php

class Directus_Settings_Controller extends Directus_Controller {

	/**
	 * Show the settings page.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$this->layout->nest('content', 'directus::settings.index');
	}
}