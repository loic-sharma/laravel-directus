<?php namespace Directus;

class Auth extends \Laravel\Auth {

	/**
	 * Get an authentication driver instance.
	 *
	 * @param  string  $driver
	 * @return Driver
	 */
	public static function driver($driver = 'directus')
	{
		return parent::driver($driver);
	}
}