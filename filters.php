<?php

/**
 * The almighty Directus Admin filter!
 *
 * Redirects the user to the login page if s/he is not logged in. Also, it
 * redirects the user off of the login page if s/he is already
 * logged in. You can't fool this bad boy.
 */ 
Route::filter('directus_admin', function()
{
	if(Directus\Auth::check())
	{
		if(URI::current() == 'directus/login')
		{
			return Redirect::to('directus');
		}
	}

	else
	{
		if(URI::current() != 'directus/login')
		{
			return Redirect::to('directus/login');
		}
	}
});