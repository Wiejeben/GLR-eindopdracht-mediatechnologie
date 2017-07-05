<?php namespace App\Controllers;

use App\Services\View;
use App\Services\Auth;
use App\Services\Redirect;
use App\Services\Session;

class AuthController extends Controller
{

	/**
	* Load login screen
	*/
	public function login()
	{
		// Load front-end
		View::make('partials/header', ['title' => 'Inloggen']);
		View::make('templates/auth/login');
		View::make('partials/footer');
	}

	/**
	* Procces login request
	*/
	public function loginPost()
	{
		// Get submitted values
		$response = $_POST;

		$auth = Auth::attempt($response['email'], $response['password']);
		if($auth === true)
		{
			// Redirect user to front-page
			Redirect::to(url('tickets'));
		}
		else
		{
			Session::flash('message', $auth);
			Redirect::to(url('auth/login'));
		}
	}

	/**
	* Load registration screen
	*/
	public function register()
	{
		// Load front-end
		View::make('partials/header', ['title' => 'Registreren']);
		View::make('templates/auth/register');
		View::make('partials/footer');
	}

	/**
	* Procces registration request
	*/
	public function registerPost()
	{
		$auth = Auth::create($_POST);

		if($auth === true)
		{
			Session::flash('message', 'Uw account is succesvol aangemaakt, er is een validatie link gestuurd naar uw mailadres om uw account te activeren.');
			Redirect::to(url('auth/login'));
		}
		
		Session::flash('message', $auth);

		View::make('partials/header', ['title' => 'Registreren']);
		View::make('templates/auth/register');
		View::make('partials/footer');
	}

	/**
	* Active account
	*/
	public function activate($email, $key)
	{
		if(Auth::activate($email, $key))
		{
			Session::flash('message', 'Uw account was zojuist succesvol geactiveerd, u kunt nu inloggen.');
			Redirect::to(url('auth/login'));
		}

		Session::flash('message', 'Er is iets mis gegaan met het activeren van uw account, mogelijk is uw account al geactiveerd.');
		Redirect::to(url('auth/login'));
	}

	/**
	* End user session
	*/
	public function logout()
	{
		Session::flush();
		Session::flash('message', 'U was succesvol uitgelogd!');
		Redirect::to(url('auth/login'));
	}
}