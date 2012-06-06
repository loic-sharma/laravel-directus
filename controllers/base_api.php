<?php

class Base_Api_Controller extends Controller {

	/**
	 * The layout being used by the controller.
	 *
	 * @var string
	 */
	public $layout = null;

	/**
	 * Indicates if the controller uses RESTful routing.
	 *
	 * @var bool
	 */
	public $restful = true;

	/**
 	 * Prepare the response for AJAX.
	 *
	 * @param  string  $method
	 * @param  array   $parameters
	 * @return mixed
	 */
	public function response($method, $parameters = array())
	{
		$output = parent::response($method, $parameters);

		// If the response is a Laravel view, simply spit it out.
		if($output instanceof Laravel\View)
		{
			return $output;
		}

		else
		{
			$response = array(
				'success' => true,
				'message' => '',
			);

			if(is_string($output))
			{
				$response['message'] = $output;
			}

			if(is_bool($response))
			{
				$response['success'] = $output;
			}

			if(is_array($output))
			{
				$response = $output;
			}

			// json encode is annoying with HTML tags. To prevent any retarded
			// slashing action from happening, we will add slashes now and later
			// remove the ones added when the response is encoded into json.
			foreach($response as $key => $value)
			{
				if(is_string($value))
				{
					$response[$key] = addslashes($value);
				}
			}

			$response = json_encode($response);
			$response = stripslashes($response);

			return $response;
		}
	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return array(
			'success' => false,
			'message' => 'invalid call'
		);
	}
}