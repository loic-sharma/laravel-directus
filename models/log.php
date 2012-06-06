<?php namespace Directus;

class Log extends \Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'directus_logs';

	/**
	 * Automatically serialize the data when it is set.
	 *
	 * @param  mixed  $data
	 * @return void
	 */
	public function set_data($data)
	{
		$this->set_attribute('data', serialize($data));
	}

	/**
	 * Automatically unserialize the data when it fetched.
	 *
	 * @return mixed
	 */
	public function get_data()
	{
		return unserialize($this->get_attribute('data'));
	}

	/**
	 * Contextualize when the log was created.
	 *
	 * @return string
	 */
	public function get_time_ago()
	{
		$timestamp = strtotime($this->get_attribute('created_at'));

		return Time::ago($timestamp);
	}

	/**
	 * Register the relationship between a log and a user.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Belongs_To
	 */
	public function user()
	{
		return $this->belongs_to('Directus\User');
	}
}