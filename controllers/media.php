<?php

class Directus_Media_Controller extends Directus_Controller {

	/**
	 * Show the media page.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$this->layout->nest('content', 'directus::media.index');
	}
}