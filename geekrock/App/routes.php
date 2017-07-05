<?php namespace App\Services;

// Pages
Route::get('/', 'PageController@home');
Route::get('/video', 'PageController@video');
Route::get('/shop', 'PageController@shop');

// Users
Route::get('/auth/login', 'AuthController@login');
Route::post('/auth/login', 'AuthController@loginPost');
Route::get('/auth/logout', 'AuthController@logout');
Route::get('/auth/register', 'AuthController@register');
Route::post('/auth/register', 'AuthController@registerPost');
Route::get('/auth/activate/{email}/{key}', 'AuthController@activate');
Route::get('/admin', 'PageController@admin', ['auth' => 'admin']);

// Tickets
Route::get('/tickets', 'TicketController@overview');
Route::get('/tickets/{id}/reserve/', 'TicketController@reserve', ['auth' => 'user']);

// Programs
Route::get('/programma', 'EventController@eventOverview');
Route::get('/admin/events', 'EventController@index', ['auth' => 'admin']);
Route::get('/admin/events/create', 'EventController@create', ['auth' => 'admin']);
Route::post('/admin/events/create', 'EventController@store', ['auth' => 'admin']);
Route::get('/admin/events/{id}/edit', 'EventController@edit', ['auth' => 'admin']);
Route::post('/admin/events/{id}/edit', 'EventController@update', ['auth' => 'admin']);
Route::get('/admin/events/{id}/destroy', 'EventController@destroy', ['auth' => 'admin']);

// Blogs
Route::get('/admin/blog', 'BlogController@index', ['auth' => 'admin']);
Route::get('/admin/blog/create', 'BlogController@create', ['auth' => 'admin']);
Route::post('/admin/blog/create', 'BlogController@store', ['auth' => 'admin']);
Route::get('/admin/blog/{id}/edit', 'BlogController@edit', ['auth' => 'admin']);
Route::post('/admin/blog/{id}/edit', 'BlogController@update', ['auth' => 'admin']);
Route::get('/admin/blog/{id}/destroy', 'BlogController@destroy', ['auth' => 'admin']);

// Check if there was any output
if(ob_get_contents() == NULL)
{
	// If there was no output, show a 404 page
	$pageController = new \App\Controllers\PageController();
	$pageController->error_404();
}