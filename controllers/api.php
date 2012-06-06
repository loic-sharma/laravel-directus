<?php

class Directus_Api_Controller extends Base_Api_Controller {

	/**
	 * Set the almighty directus admin filter!
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->filter('before', 'directus_admin');

		parent::__construct();
	}

	/**
	 * View the server's information.
	 *
	 * @return string
	 */
	public function get_info()
	{
		// phpinfo automatically sends the information to the browser. To
		// prevent this the output will be buffered so that it can be altered.
		ob_start();

		phpinfo();

		$phpinfo = ob_get_contents();

		ob_end_clean();

		// Remove everything that is outside of the body tags.
		$phpinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $phpinfo);

		// Get the database information
		$connection = Config::get('database.default');
		$connection = Config::get('database.connections.'.$connection);

		$mysql_version = head(DB::query('SELECT VERSION() as version'))->version;

		// Build the session variables, and get rid of variables that contain
		// sensitive information.
		$session = Session::instance()->session['data'];

		unset($session['csrf_token']);

		return View::make('directus::api.info')
				->with('phpinfo', $phpinfo)
				->with('mysql_version', $mysql_version)
				->with('connection', $connection)
				->with('session', $session);
	}

	/**
	 * Save a variable to a session.
	 *
	 * @return string
	 */
	public function post_set_session()
	{
		Session::put(Input::get('key'), trim(Input::get('value'), ','));

		return 'Successfully set ' . Input::get('key');
	}

	/**
	 * Create a new backup of the database.
	 *
	 * @return mixed
	 */
	public function get_backup()
	{
		// Create the database SQL
		$backup = Directus\Database::backup();

		// Save the SQL to a file
		$path = path('storage').'directus'.DS.'backups'.DS;
		$name = date('Y_m_d_His').'_'.Directus\Auth::user()->id;
		$file = $path.$name.'.sql';

		File::put($file, $backup);

		// Log the backup
		$log = new Directus\Log;

		$log->user_id = Directus\Auth::user()->id;	
		$log->type = 'backed up';
		$log->data = compact('file');

		$log->save();
	}

	/**
	 * Display the meda modal.
	 *
	 * @return Laravel\View
	 */
	public function post_media_modal()
	{
		return View::make('directus::api.media_modal');
	}

	public function post_media_upload()
	{
		
	}

	/**
	 * Add a new message to a row of a table.
	 *
	 * @return array
	 */
	public function post_add_message()
	{
		$message = new Directus\Message;

		$message->user_id = Directus\Auth::user()->id;
		$message->table   = Input::get('table');
		$message->row     = Input::get('row');
		$message->content = Input::get('message');

		$message->save();

		return View::make('directus::api.message')
					->with('message', $message->content);
	}	
}