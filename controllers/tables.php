<?php

class Directus_Tables_Controller extends Directus_Controller {

	/**
	 * List all of the editable tables.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$tables = Directus\Database::list_tables_with_info();

		$this->layout->nest('content', 'directus::tables.index', compact('tables'));
	}

	/**
	 * List all of the rows of a table.
	 *
	 * @param  int   $table
	 * @return void
	 */
	public function get_table($table)
	{
		try
		{
			$table = Directus\Table::get($table);

			$this->layout->data_table = true;

			$this->layout->nest('content', 'directus::tables.table', compact('table'));
		}

		// If the table doesn't exist silenty catch the exception and redirect
		// out of here.
		catch(Laravel\Database\Exception $e)
		{
			return Redirect::to('directus/tables');
		}
	}

	/**
	 * Show the form to add a new row to a table.
	 *
	 * @param  int   $table
	 * @return void
	 */
	public function get_add($table)
	{
		$fields = Directus\Table::fields($table);

		$this->layout->nest('content', 'directus::tables.add', compact('table', 'fields'));
	}

	/**
	 * Add a new row to a table.
	 *
	 * @param  int   $table
	 * @return void
	 */
	public function post_add($table)
	{
		$input  = array();
		$fields = Directus\Table::fields($table);

		foreach($fields as $field => $type)
		{
			// Skip the id field if it exists.
			if($field != 'id')
			{
				// The user id field will use the session data, not the form
				// data.
				if($field == 'user_id')
				{
					$input[$field] = Directus\Auth::user()->id;
				}

				else
				{
					$input[$field] = Input::get($field);
				}
			}
		}

		$id = DB::table($table)->insert_get_id($input);

		// Log the creation of this new item. Note that all of the bindings are
		// saved so that an UPDATE query can later be created to revert the item
		// to this state, if it is later modified.
		$log = new Directus\Log;

		$log->user_id = Directus\Auth::user()->id;
		$log->table   = $table;
		$log->row     = $id;
		$log->type    = 'added';
		$log->data    = $input;

		$log->save();		

		// Let's figure out what the user wants
		$action = Input::get('save_and');

		if($action == 'stay')
		{
			return Redirect::to('directus/table/'.$table.'/edit/'.$id);
		}

		else
		{
			if($action == 'add')
			{
				return Redirect::to('directus/table/'.$table.'/add');
			}
		}

		return Redirect::to('directus/table/'.$table);
	}

	/**
	 * Show the form to edit a row of a table.
	 *
	 * @param  int   $table
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($table, $id)
	{
		$row = DB::table($table)->find($id);

		if(is_null($row))
		{
			return Redirect::to('directus/table/'.$table);
		}

		$fields = Directus\Table::fields($table);

		$logs = Directus\Log::with('user')
					->where_table($table)
					->where_row($id)
					->order_by('created_at', 'desc')
					->get();

		$messages = Directus\Message::with('user')
						->where_table($table)
						->where_row($id)
						->order_by('created_at', 'desc')
						->get();


		$data = compact('table', 'row', 'fields', 'logs', 'messages');

		$this->layout->nest('content', 'directus::tables.edit', $data);
	}

	/**
	 * Edit a row of a table.
	 *
	 * @param  int   $table
	 * @param  int   $id
	 * @return void
	 */
	public function post_edit($table, $id)
	{
		$input  = array();
		$fields = Directus\Table::fields($table);

		foreach($fields as $field => $type)
		{
			// Skip the id and user_id fields if they exist.
			if($field != 'id' && $field != 'user_id')
			{
				$input[$field] = Input::get($field);
			}
		}

		// Log the edit
		$log = new Directus\Log;

		$log->user_id = Directus\Auth::user()->id;
		$log->table   = $table;
		$log->row     = $id;
		$log->type    = 'edited';
		$log->data    = $input;

		$log->save();	

		// Let's figure out what the user wants
		$action = Input::get('save_and');

		if( ! is_null($action))
		{
			if($action == 'duplicate')
			{
				DB::table($table)->insert($input);
			}

			else
			{
				$db = DB::table($table)->where_id($id);

				if($action == 'delete')
				{
					$db->delete();
				}

				else
				{
					$db->update($input);

					if($action == 'stay')
					{
						return Redirect::to('directus/table/'.$table.'/edit/'.$id);
					}

					if($action == 'add')
					{
						return Redirect::to('directus/table/'.$table.'/add');
					}	
				}
			}
		}

		return Redirect::to('directus/table/'.$table);
	}
}