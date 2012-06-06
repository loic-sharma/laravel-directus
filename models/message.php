<?php namespace Directus;

class Message extends \Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'directus_messages';

	/**
	 * Automatically escape the message's content when it is fetched.
	 *
	 * @return string
	 */
	public function get_content()
	{
		return e($this->get_attribute('content'));
	}

	/**
	 * Contextualize when the message was created.
	 *
	 * @return string
	 */
	public function get_time_ago()
	{
		$created_at = strtotime($this->get_attribute('created_at'));

		return Time::ago($created_at);
	}

	/**
	 * Register the relationship between a message and a user.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Belongs_To
	 */
	public function user()
	{
		return $this->belongs_to('Directus\User');
	}
}