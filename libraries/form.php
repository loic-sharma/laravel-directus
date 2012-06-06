<?php namespace Directus; use \View;

class Form {

	/**
	 * Build a field base off of information gathered from the database.
	 *
	 * @return Laravel\View
	 */
	public static function generate_field($name, $value, $fields)
	{
		// Get the field's information
		list($field, $length) = Database::field_info($fields[$name]);

		// A lot of fields share the same form inputs.
		$shared = array(
			'integer' => array(
				'smallint', 'mediumint', 'int', 'bigint', 'bit', 'real',
				'double', 'float', 'decimal', 'numeric',
			),

			'text' => array(
				'tinyblob', 'blob', 'mediumblob', 'longblob', 'tinytext',
				'mediumtext', 'longtext',
			),

			'string' => array(
				'varchar', 'char',
			),
		);

		foreach($shared as $base => $fields)
		{
			foreach($fields as $possible_field)
			{
				// If the field is shared, rewrite the field to the base field.
				if($field == $possible_field)
				{
					$field = $base;
				}
			}
		}

		// Hide fields that the user should not see
		if($name == 'id' || $name == 'user_id')
		{
			$field = 'hidden';
		}

		$data = compact('name', 'length', 'value');

		try
		{
			$output = View::make('directus::tables.fields.'.$field, $data);
		}

		// If the field's type does not have a view, default to the string's view.
		catch(Exception $e)
		{
			$output = View::make('directus::tables.fields.string', $data);
		}

		return $output;
	}
}