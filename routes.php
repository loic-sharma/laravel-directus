<?php

Route::controller(Controller::detect('directus'));

Route::any('directus/inbox', 'directus::home@inbox');

Route::any('directus/table/(:any)', 'directus::tables@table');
Route::any('directus/table/(:any)/add', 'directus::tables@add');
Route::any('directus/table/(:any)/edit/(:num)', 'directus::tables@edit');

Route::any('directus/login', 'directus::user@login');
Route::any('directus/forgot', 'directus::user@forgot');
Route::any('directus/logout', 'directus::user@logout');

Route::any('directus/test', function ()
{
	$user = new Directus\User;

	$user->email      = 'sharma.loic@gmail.com';
	$user->password   = 'corinne';
	$user->first_name = 'Loic';
	$user->last_name  = 'Sharma';

	$user->save();
});