<?php namespace App\Controllers;

use App\Services\View;
use App\Models\Blog;

class PageController extends Controller
{

	/**
	* Load home page
	*/
	public function home()
	{
		// Load blogs
		$blogs = Blog::all();

		// Load front-end
		View::make('partials/header');
		View::make('templates/home', ['blogs' => $blogs]);
		View::make('partials/footer');
	}

	/**
	* Load video page
	*/
	public function video()
	{
		// Load front-end
		View::make('partials/header', ['title' => 'Video\'s']);
		View::make('templates/videos');
		View::make('partials/footer');
	}

	/**
	* Load shop page
	*/
	public function shop()
	{
		// Load front-end
		View::make('partials/header', ['title' => 'Shop']);
		View::make('templates/shop');
		View::make('partials/footer');
	}

	/**
	* Load tickets page
	*/
	public function tickets()
	{
		// Load front-end
		View::make('partials/header', ['title' => 'Tickets']);
		View::make('templates/tickets');
		View::make('partials/footer');
	}

	/**
	* Load admin overview
	*/
	public function admin()
	{
		// Load front-end
		View::make('partials/header', ['title' => 'Admin overzicht']);
		View::make('templates/admin/index');
		View::make('partials/footer');
	}

	/**
	* Load 403 no access page
	*/
	public function error_403()
	{
		// set response code
		http_response_code(403);

		// Load front-end
		View::make('partials/header', ['title' => '403: Geen toegang']);
		View::make('templates/errors/403');
		View::make('partials/footer');
	}

	/**
	* Load 404 not found page
	*/
	public function error_404()
	{
		// set response code
		http_response_code(404);

		// Load front-end
		View::make('partials/header', ['title' => '404: Pagina niet gevonden']);
		View::make('templates/errors/404');
		View::make('partials/footer');
	}

}