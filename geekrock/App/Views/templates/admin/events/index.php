<div class="container_12">
	<table border="1" class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titel</th>
				<th>Dag</th>
				<th>Tijd</th>
				<th>Acties</th>
			</tr>
		</thead>
		<tbody>
			<a href="{{ url('admin/events/create') }}">Toevoegen</a>
			<?php foreach($events as $event):?>
			
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
			<tr>
				<td>{{ $event->id }}</td>
				<td><a href="{{ url('programma#event_' . $event->id) }}">{{ $event->title }}</a></td>
				<td>{{ $tickets[$event->ticket_id - 1]->name }}</td>
				<td>{{ date('H:i', strtotime($event->time)) }}</td>
				<td><a href="{{ url('admin/events/' . $event->id . '/edit') }}">Wijzigen</a> | <a href="{{ url('admin/events/' . $event->id . '/destroy') }}" class="confirm">Verwijderen</a></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>