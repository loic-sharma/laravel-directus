<?php

/**
 * A global helper used throughout directus. 
 *
 * @param  string  $string
 * @return void
 */
function directus_prettify($string)
{
	return ucwords(str_replace('_', ' ', $string));
}

View::composer('directus::layouts.default', function($view)
{
	if( ! isset($view->data_table))
	{
		$view->data_table = false;
	}

	$view->with('is_current_page', function($page = '')
	{
		return (URI::segment(2) == $page) ? 'class="current"' : '';
	});
});

View::composer('directus::tables.table', function($view)
{
	$view->with('edit', function($table, $row)
	{
		if(isset($table->fields['id']))
		{
			$url = URL::to('directus/table/'.$table->name.'/edit/'.$row->id);

			return 'onclick="location.href=\''.$url.'\'" class="editable"';
		}
	});

	$view->with('transcribe', function($type, $value)
	{
		if($type == 'date')
		{
			return ($value == '0000-00-00') ? 'No date' : date('M j, Y', strtotime($value));
		}

		if($type == 'time')
		{
			return date('g:i A', strtotime($value)); 
		}

		if($type == 'datetime')
		{
			return date('M j, Y - g:i A', strtotime($value));
		}

		return $value;
	});
});