<?php

include Bundle::path('directus').DS.'filters.php';
include Bundle::path('directus').DS.'composers.php';

Autoloader::map(array(

	// Controllers
	'Base_Api_Controller' => Bundle::path('directus').DS.'controllers'.DS.'base_api.php',
	'Directus_Controller' => Bundle::path('directus').DS.'controllers'.DS.'directus.php',

	// Models
	'Directus\\User'     => Bundle::path('directus').DS.'models'.DS.'user.php',
	'Directus\\Log'      => Bundle::path('directus').DS.'models'.DS.'log.php',
	'Directus\\Table'    => Bundle::path('directus').DS.'models'.DS.'table.php',
	'Directus\\Message'  => Bundle::path('directus').DS.'models'.DS.'message.php',
	'Directus\\Database' => Bundle::path('directus').DS.'models'.DS.'database.php',

	// Libraries
	'Directus\\Time'         => Bundle::path('directus').DS.'libraries'.DS.'time.php',
	'Directus\\Form'         => Bundle::path('directus').DS.'libraries'.DS.'form.php',
	'Directus\\Auth'         => Bundle::path('directus').DS.'libraries'.DS.'auth.php',
	'Directus\\Auth\\Driver' => Bundle::path('directus').DS.'libraries'.DS.'auth'.DS.'driver.php',
));

Auth::extend('directus', function()
{
	return new Directus\Auth\Driver;
});