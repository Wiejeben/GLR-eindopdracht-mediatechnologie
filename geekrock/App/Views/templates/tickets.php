<div class="container_12">
	<div class="grid_12">
		<h2><span>Tickets</span> reserveren</h2>
		<?php if(Session::has('alert')):?>
			<div class="alert alert-danger">
				{{ Session::flash('alert') }}
			</div>
		<?php endif;?>

		<?php if(Session::has('success')):?>
			<div class="alert alert-success">
				{{ Session::flash('success') }}
			</div>
		<?php endif;?>
		<?php if(Auth::access()):?>
			<p>Hallo {{ Session::get('name') }},</p><br />
			<p>Door op de knop reserveren te drukken kiest u om die ticket te reserveren, deze zal zo snel mogelijk naar uw adres gestuurd worden, als de knop donkergroen is dan is deze reeds gereserveerd.</p><br />
		<?php endif;?>
	</div>
	<section>
		<!-- Tickets -->
		<?php foreach($tickets as $ticket):?>
			<article class="grid_4 block-ticket">
				<div class="block-ticket--inner">
					<h2>{{ $ticket->name }}</h2>
					<a class="btn btn-success {{ (!Auth::access() || \App\Models\Ticket::hasTicket($ticket->id)) ? 'disabled' : '' }}" href="{{ url('/tickets/' . $ticket->id . '/reserve/') }}">Reserveren</a>
				</div>
			</article>
		<?php endforeach;?>
	</section>

	<?php if(!Auth::access()):?>
		<div class="grid_12">
			<hr />
			<p>Om een ticket te kunnen bestellen is het hebben van een account verplicht, dit is omdat wij uw adresgegvens nodig hebben voor het opsturen van de tickets, ook kunt u zien welke tickets er reeds besteld zijn.</p>
		</div>
		<div class="grid_6">
			<?php View::make('templates/auth/login', ['embed' => true]);?>
		</div>
		<div class="grid_6">
			<?php View::make('templates/auth/register', ['embed' => true]);?>
		</div>
	<?php endif;?>
</div>