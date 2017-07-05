<?php namespace App\Controllers;

use App\Services\View;
use App\Services\Session;
use App\Services\Redirect;
use App\Models\Event;
use App\Models\Ticket;

class EventController extends Controller
{

	/**
	* Load event admin overview
	*/
	public function index()
	{
		// Get all events
		$events = Event::all();
		$tickets = Ticket::all();

		// Generate output
		View::make('partials/header', ['title' => 'Programma\'s beheren']);
		View::make('templates/admin/events/index', ['events' => $events, 'tickets' => $tickets]);
		View::make('partials/footer');
	}

	/**
	* Load event article create page
	*/
	public function create()
	{
		$tickets = Ticket::all();

		// Generate output
		View::make('partials/header', ['title' => 'Programma aanmaken']);
		View::make('templates/admin/events/create', ['tickets' => $tickets]);
		View::make('partials/footer');
	}

	/**
	* Procces event insert
	*/
	public function store()
	{
		$event = Event::insert($_POST);

		if($event === true)
		{
			Session::flash('success', 'Item succesvol aangemaakt.');
			Redirect::to(url('admin/events'));
		}
		
		Session::flash('alert', 'Er is iets mis gegaan met het opslaan van dit programma.');
		Redirect::to(url('admin/events/create'));
	}

	/**
	* Load event edit page
	*/
	public function edit($id)
	{
		// Get specific event and tickets
		$event = Event::find($id);
		$tickets = Ticket::all();

		// Generate output
		View::make('partials/header', ['title' => 'Programma wijzigen']);
		View::make('templates/admin/events/edit', ['event' => $event, 'tickets' => $tickets]);
		View::make('partials/footer');
	}

	/**
	* Procces event edit
	*/
	public function update($id)
	{
		$event = Event::update($_POST, $id);

		if($event === true)
		{
			Session::flash('success', 'Item succesvol gewijzigd.');
			Redirect::to(url('admin/events'));
		}
		
		Session::flash('alert', 'Er is iets mis gegaan met het opslaan van dit programma.');
		Redirect::to(url('admin/events/create'));
	}

	/**
	* Remove program
	*/
	public function destroy($id)
	{
		$event = Event::destroy($id);

		if($event === true)
		{
			Session::flash('success', 'Item was succesvol verwijdert!.');
			Redirect::to(url('admin/events'));
		}

		Session::flash('alert', 'Er is iets mis gegaan met het verwijderen van dit programma.');
		Redirect::to(url('admin/events'));
	}

	/**
	* Load front-end event overview
	*/
	public function eventOverview()
	{
		// Get all events and tickets
		$events = Event::all();
		$tickets = Ticket::all();

		// Load front-end
		View::make('partials/header', ['title' => 'Programma']);
		View::make('templates/programs', ['events' => $events, 'tickets' => $tickets]);
		View::make('partials/footer');
	}
}