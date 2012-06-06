<?php

class Directus_Controller extends Controller {

	/**
	 * The layout being used by the controller.
	 *
	 * @var string
	 */
	public $layout = 'directus::layouts.default';

	/**
	 * Indicates if the controller uses RESTful routing.
	 *
	 * @var bool
	 */
	public $restful = true;

	/**
	 * Register the Directus Admin filter to all of the routes.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->filter('before', 'directus_admin');

		parent::__construct();
	}

	/**
	 * Save the user's activity before returning the response.
	 *
	 * @param  string  $method
	 * @param  array   $parameters
	 * @return mixed
	 */
	public function response($method, $parameters = array())
	{
		$response = parent::response($method, $parameters);

		// Save the user's activity.
		if(Directus\Auth::check())
		{
			if ( ! Request::ajax())
			{
				// Note: Eloquent models only save if their data changes.
				// Therefore, even if a user requests a new page their last
				// activity will not be saved unless the activity changes.
				list(,$activity) = explode('_', class_basename($this));

				Directus\Auth::user()->activity = $activity;

				Directus\Auth::user()->save();
			}
		}

		return $response;
	}
}