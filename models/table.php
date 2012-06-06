<?php namespace Directus; use DB;

class Table {

	/**
	 * Get a specific table's name, fields, and all of its rows.
	 *
	 * @param  string     $table
	 * @return stdObject
	 */
	public static function get($table)
	{
		$tables = Database::list_tables();

		if(isset($tables[$table]))
		{
			$name = $table;

			$fields = static::fields($table);

			$rows = DB::table($table)->get();

			return (object) compact('name', 'fields', 'rows');
		}
	}

	/**
	 * Get the fields of a table.
	 *
	 * @param  string  $table
	 * @return array
	 */
	public static function fields($table)
	{
		$fields = array();
		$query  = DB::connection()->pdo->query('SHOW FULL COLUMNS FROM `'.$table.'`');

		while($row = $query->fetch())
		{
			$fields[$row['field']] = $row['type'];
		}

		return $fields;
	}

	/**
	 * Get the number of tables in the database.
	 *
	 * @return int
	 */
	public static function count()
	{
		return count(Database::list_tables());
	}

	/**
	 * Get the number of rows of a specific table.
	 *
	 * @param  string  $table
	 * @return int
	 */
	public static function row_count($table)
	{
		return DB::table($table)->count();
	}
}