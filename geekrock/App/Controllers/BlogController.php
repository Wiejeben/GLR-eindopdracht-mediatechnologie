<?php namespace App\Controllers;

use App\Services\View;
use App\Services\Session;
use App\Services\Redirect;
use App\Models\Blog;

class BlogController extends Controller
{

	/**
	* Load blog admin overview
	*/
	public function index()
	{
		// Get all blogs
		$blogs = Blog::all();

		// Generate output
		View::make('partials/header', ['title' => 'Blog\'s beheren']);
		View::make('templates/admin/blogs/index', ['blogs' => $blogs]);
		View::make('partials/footer');
	}

	/**
	* Load blog article create page
	*/
	public function create()
	{
		// Generate output
		View::make('partials/header', ['title' => 'Blog aanmaken']);
		View::make('templates/admin/blogs/create');
		View::make('partials/footer');
	}

	/**
	* Procces blog article insert
	*/
	public function store()
	{
		$blog = Blog::insert($_POST);

		if($blog === true)
		{
			Session::flash('success', 'Bericht succesvol aangemaakt.');
			Redirect::to(url('admin/blog'));
		}
		
		Session::flash('alert', 'Er is iets mis gegaan met het opslaan van dit bericht.');
		Redirect::to(url('admin/blogs/create'));
	}

	/**
	* Load blog article edit page
	*/
	public function edit($id)
	{
		// Get specific blogs
		$blog = Blog::find($id);

		// Generate output
		View::make('partials/header', ['title' => 'Bericht wijzigen']);
		View::make('templates/admin/blogs/edit', ['blog' => $blog]);
		View::make('partials/footer');
	}

	/**
	* Procces blog article edit
	*/
	public function update($id)
	{
		$blog = Blog::update($_POST, $id);

		if($blog === true)
		{
			Session::flash('success', 'Bericht succesvol gewijzigd.');
			Redirect::to(url('admin/blog'));
		}
		
		Session::flash('alert', 'Er is iets mis gegaan met het opslaan van dit bericht.');
		Redirect::to(url('admin/blogs/create'));
	}

	/**
	* Remove article
	*/
	public function destroy($id)
	{
		$blog = Blog::destroy($id);

		if($blog === true)
		{
			Session::flash('success', 'Bericht was succesvol verwijdert!.');
			Redirect::to(url('admin/blog'));
		}

		Session::flash('alert', 'Er is iets mis gegaan met het verwijderen van dit bericht.');
		Redirect::to(url('admin/blogs'));
	}
}