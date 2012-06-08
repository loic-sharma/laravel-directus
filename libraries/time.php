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
		if(is_null($end))
		{
			$end = time();
		}

		$seconds = $end - $start;

		$times = array(
			'year'   => $seconds / 31556926,
			'week'   => $seconds / 604800,
			'day'    => $seconds / 86400,
			'hour'   => $seconds / 3600,
			'minute' => $seconds / 60,
			'second' => $seconds,
		);

		foreach($times as $key => $value)
		{
			if($value > 1)
			{
				return $value.' '.$key . 's ago';
			}

			if($value == 1)
			{
				return $value.' '.$key.' ago';
			}
		}

		return 'Just now';
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