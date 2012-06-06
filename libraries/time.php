<?php namespace Directus;

class Time {

	/**
	 * Find the contextual time between two timestamps.
	 *
	 * @param  int     $start
	 * @param  int     $end
	 * @return string
	 */
	public static function ago($start, $end = null)
	{
		// Todo, remake this
		$timestamp = time();

		if(is_null($end))
		{
			$end = $timestamp;
		}

		$n = $end - $start;

		if($n == 0)
		{
			return 'Just now';
		}

		if($n < 60) 
		{
			return $n . ' second' . ($n > 1 ? 's' : '') . ' ago';
		}

		if($n < (60*60))
		{
			$minutes = round($n / 60);

			return $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
		}

		if($n < (60*60*16))
		{
			$hours = round($n/(60*60));

			return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
		}

		if($n < ($timestamp - strtotime('yesterday')))
		{
			return 'Yesterday';
		}

		if($n < (60*60*24))
		{
			$hours = round($n / (60*60));

			return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
		}

		if($n < (60*60*24*7))
		{
			$days = round($n / (60*60*24));

			return $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
		}
	
		if($n < ($timestamp - strtotime('last week')))
		{
			return 'Last week';
		}

		if($n < (60*60*24*7*4))
		{
			$weeks = round($n/(60*60*24*7));

			return 'About ' . $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
		}

		if($n < ($timestamp - strtotime('last month')))
		{
			return 'Last month';
		}

		if($n < (60*60*24*7*4*12))
		{
			$months = round($n/(60*60*24*7*4));

			return $months . ' month' . ($months > 1 ? 's' : '') . ' ago';
		}

		if($n < ($timestamp - strtotime('last year')))
		{
			return 'Last year';
		}

		if($n >= (60*60*24*7*4*12*10))
		{
			return 'decades ago';
		}

		if($n >= (60*60*24*7*4*12))
		{
			$years = round($n/(60*60*24*7*4*12));

			return $years . ' year' . ($years > 1 ? 's' : '') . ' ago';
		}
	}

	/**
	 * Find the contextual time until a specific timestamp.
	 *
	 * @param  int     $seconds
	 * @return string
	 */
	public static function until($seconds)
	{
		if($seconds == 0)
		{
			return 'now';
		}

		$times = array(
			array(1),
			array(60, 'second'),
			array(3600, 'minute'),
			array(86400, 'hour'),
			array(604800, 'day'),
			array(31556926, 'week'),
			array(3.1556926e+10, 'year'),
			array(0, 'infinity'),
		);

		for($i = 1; $i < count($times); $i++)
		{
			$n = $seconds / $times[$i-1][0];

			if($seconds < $times[$i][0])
			{
				return round($n) . ' ' . $times[$i][1] . ($n > 1 ? 's' : '');
			}
		}
	}
}