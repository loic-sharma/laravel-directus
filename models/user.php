<?php namespace Directus;

class User extends \Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'directus_users';

	/**
	 * Automatically hash the user's password.
	 *
	 * @param  string  $password
	 * @return void
	 */
	public function set_password($password)
	{
		$this->set_attribute('password', \Hash::make($password));
	}

	/**
	 * Create the user's full name.
	 *
	 * @return string
	 */
	public function get_name()
	{
		$first_name = $this->get_attribute('first_name');
		$last_name  = $this->get_attribute('last_name');

		return $first_name . ' ' . $last_name;
	}

	/**
	 * Contextualize when the user was created.
	 *
	 * @return string
	 */
	public function get_updated_at()
	{
		$updated_at = $this->get_attribute('updated_at');

		// Don't mess with the updated_at field if it is currently a DateTime
		// object as it seems to cause issues in migrations.
		if($updated_at instanceof \DateTime)
		{
			return $updated_at;
		}

		$timestamp = strtotime($this->get_attribute('updated_at'));

		return Time::ago($timestamp);
	}

	/**
	 * Create the gravatar hash.
	 *
	 * @return string
	 */
	public function get_gravatar_hash()
	{
		return md5(strtolower($this->get_attribute('email')));
	}
}