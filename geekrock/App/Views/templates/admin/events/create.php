<div class="container_12">
	<div class="user-module grid_4 prefix_4">
		<div class="user-header">
			<h1 class="text-center font-large white">Programma aanmaken</h1>
		</div>
		<form method="post" action="{{ url('admin/events/create') }}">
			<table class="table">
				<tbody>
					<tr>
						<td>
							<label for="inputTitle" class="form-label">Titel: </label>
						</td>

						<td>
							<input type="text" name="title" id="inputTitle" class="form-input" required autofocus>
						</td>
					</tr>
					<tr>
						<td>
							<label for="inputArtist" class="form-label">Artiest: </label>
						</td>

						<td>
							<input type="text" name="artist" id="inputArtist" class="form-input">
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
									<option value="{{ $ticket->id }}">{{ $ticket->name }}</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>

					<tr>
						<td>
							<label for="inputTime" class="form-label">Starttijd: </label>
						</td>

						<td>
							<input type="time" name="time" id="inputTime" class="form-input" required>
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<label for="inputDescription" class="form-label">Omschrijving: </label>
							<textarea name="description" id="inputDescription" class="form-textarea"></textarea>
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="submit" value="Toevoegen" class="btn btn-default right">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>