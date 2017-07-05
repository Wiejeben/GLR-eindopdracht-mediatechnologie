<?php namespace App\Controllers;

use App\Services\View;
use App\Services\Session;
use App\Services\Redirect;
use App\Services\Mail;

use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{

	/**
	* Load ticket page
	*/
	public function overview()
	{
		// Get all ticket options
		$tickets = Ticket::all();

		// Load front-end
		View::make('partials/header', ['title' => 'Tickets']);
		View::make('templates/tickets', ['tickets' => $tickets]);
		View::make('partials/footer');
	}

	/**
	* Procces reservation
	*/
	public function reserve($id)
	{
		// Check if user wasn't already reserved
		$reservation = Ticket::reserve($id);

		if($reservation === true)
		{
			$ticket = Ticket::find($id);

			$message = '
				Beste ' . Session::get('name') . ',<br />
				<br />
				Bedankt voor uw reservatie, wij zullen zo snel mogelijk uw ticket voor ' . $ticket->name . ' naar u toe sturen.<br />
				<br />
				Met vriendelijke groet,<br />
				GeekRock 2015
			';

			// Send mail and redirect back with a message
			Mail::send(Session::get('email'), 'Uw reservering voor GeekRock 2015', $message);
			Session::flash('success', 'Uw ticket is succesvol geregistreerd, zie uw mailbox voor meer informatie.');
			Redirect::to(url('tickets'));
		}

		// Reservation failed, go back with a message
		Session::flash('alert', 'Er is iets mis gegaan met je reservering, mogelijk had u deze al gereserveerd.');
		Redirect::to(url('tickets'));
	}

}