<div class="container_12">
	<div class="user-module grid_4 prefix_4">
		<div class="user-header">
			<h1 class="text-center font-large white">Programma wijzigen</h1>
		</div>
		<form method="post" action="{{ url('admin/events/' . $event->id . '/edit') }}">
			<table class="table">
				<tbody>
					<tr>
						<td>
							<label for="inputTitle" class="form-label">Titel: </label>
						</td>

						<td>
							<input type="text" name="title" id="inputTitle" class="form-input" value="{{ $event->title }}" required autofocus>
						</td>
					</tr>
					<tr>
						<td>
							<label for="inputArtist" class="form-label">Artiest: </label>
						</td>

						<td>
							<input type="text" name="artist" id="inputArtist" class="form-input" value="{{ $event->artist }}">
						</td>
					</tr>
					<tr>
						<td>
							<label for="inputDay" class="form-label">Dag: </label>
						</td>

						<td>
							<select name="ticket_id" id="inputDay" required>
								<option value="" disabled selected>Selecteer een dag</option>
								<?php foreach($tickets as $ticket): ?>
									<option value="{{ $ticket->id }}" {{ ($event->ticket_id == $ticket->id) ? 'selected' : '' }}>{{ $ticket->name }}</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>

					<tr>
						<td>
							<label for="inputTime" class="form-label">Starttijd: </label>
						</td>

						<td>
							<input type="time" name="time" id="inputTime" class="form-input" value="{{ $event->time }}" required>
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<label for="inputDescription" class="form-label">Omschrijving: </label>
							<textarea name="description" id="inputDescription" class="form-textarea">{{ $event->description }}</textarea>
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="submit" value="Wijzigen" class="btn btn-default right">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>