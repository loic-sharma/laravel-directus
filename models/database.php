<?php namespace Directus; use \DB, \Config;

class Database {

	/**
	 * A list of the tables in the database.
	 *
	 * @var array
	 */
	static $tables;

	/**
	 * Create the SQL of the current database.
	 *
	 * @return string
	 */
	public static function backup()
	{
		$tables = static::list_all_tables();

		$pdo = DB::connection()->pdo;
		$connection = Config::get('database.default');
		$database = Config::get("database.connections.{$connection}.database");

		$backup = '';
  
  		foreach($tables as $table_name => $table)
		{
			// Drop all the tables if they already exist so that all of the data
			// can be freshly inserted.
			$backup .= 'DROP TABLE IF EXISTS '.$table_name.';'.PHP_EOL.PHP_EOL;

			// Create the table's schema.
	  		$query = $pdo->query('SHOW CREATE TABLE '.$database.'.'.$table_name);
			$query = $query->fetch();

			$backup .= $query['create table'].';'.PHP_EOL;

			// Trim off the end comma.
			$fields = substr($fields, 0, -2);

			// Build all of the table's data.
			$rows = DB::table($table_name)->get();

			if(count($rows) > 0)
			{
				$backup .= PHP_EOL;

				// If the table has rows, build a list of the table's columns
				// so that INSERT queries can be created.
				$integers = array();

				$i = 0;
				$fields = '';

				foreach(Table::fields($table_name) as $name => $type)
				{
					$fields .= '`'.$name.'`, ';

					list($type, $length) = static::field_info($type);

					if(strpos($type, 'int') !== false)
					{
						$integers[] = $i;
					}

					$i++;
				}
			}

			foreach($rows as $row)
			{
				$values = '';

				foreach($row as $value)
				{
					// Null values and integers should not be quoted.
					if(is_null($value))
					{
						$values .= 'NULL';
					}

					else
					{
						if(in_array($i, $integers))
						{
							$values .= $value;	
						}

						// Everything else is quoted.
						else
						{
							$values .= $pdo->quote($value);
						}
					}

					$values .= ', ';
				}

				// Trim off the end comma.
				$values = substr($values, 0, -2);

				$backup .= 'INSERT INTO '.$table_name.' ('.$fields.') VALUES ('.$values.');'.PHP_EOL;
			}

			$backup .= PHP_EOL;
		}

  		return $backup;
	}

	/**
	 * List the tables in the database.
	 *
	 * @param  bool   $with_info
	 * @param  bool   $directus_table
	 * @return array
	 */
	public static function list_tables($with_info = false, $directus_tables = false)
	{
		if(is_null(static::$tables))
		{
			static::$tables = array();

			$query = DB::connection()->pdo->query('SHOW TABLES');

			while($row = $query->fetch())
			{
				// If the table is prefixed by directus_, it is a directus
				// table. These should only be shown if requested.
				if($directus_tables == false)
				{
					if(strpos($row[0], 'directus_') === 0)
					{
						continue;
					}
				}

				$table['name'] = directus_prettify($row[0]);

				if($with_info == true)
				{
					$table['rows'] = Table::row_count($row[0]);
				}

				static::$tables[$row[0]] = (object)$table;
			}
		}

		return static::$tables;
	}

	/**
	 * List the tables in the database with the number of rows of data
	 * the tables contain.
	 *
	 * @return array
	 */
	public static function list_tables_with_info()
	{
		return static::list_tables(true);
	}

	/**
	 * List all of the tables in the database, including directus' tables.
	 *
	 * @return array
	 */
	public static function list_all_tables()
	{
		return static::list_tables(false, true);
	}

	/**
	 * Determine the field's type and length off of the column information.
	 *
	 * @param  string  $column
	 * @return array
	 */
	public static function field_info($column)
	{
		$type   = $column;
		$length = false;

		if(strpos($column, '(') !== false)
		{
			list($type, $length) = explode('(', $column);

			$length = substr($length, 0, -1);
		}

		return array($type, (int)$length);
	}
}