<div class="container_12">
	<div class="user-module grid_4 prefix_4">
		<div class="user-header">
			<h1 class="text-center font-large white">Bericht aanmaken</h1>
		</div>
		<form method="post" action="{{ url('admin/blog/create') }}">
			<table class="table">
				<tbody>
					<tr>
						<td>
							<label for="inputTitle" class="form-label">Titel: </label>
						</td>

						<td>
							<input type="text" name="title" id="inputTitle" class="form-input" required>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label for="inputDescription" class="form-label">Tekst: </label>
							<textarea name="body" id="inputDescription" class="form-textarea" required autofocus></textarea>
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