<div class="container_12">
	<section class="user-module grid_4 {{ (isset($embed) && $embed === true) ? 'prefix_1' : 'prefix_4' }}">
		<div class="user-header">
			<h1 class="text-center font-large white">Inloggen</h1>
			<?php if(Session::has('message')):?>
				<div class="alert alert-warning">
					{{ Session::flash('message') }}
				</div>
			<?php endif;?>
		</div>
		<form action="{{ url('auth/login') }}" method="post">
			<table class="table">
				<tbody>
					<tr>
						<td>
							<label for="inputEmailLogin" class="form-label">E-mailadres: </label>
						</td>

						<td>
							<input type="email" name="email" id="inputEmailLogin" class="form-input" required autofocus>
						</td>
					</tr>
					<tr>
						<td>
							<label for="inputPasswordLogin" class="form-label">Wachtwoord: </label>
						</td>

						<td>
							<input type="password" name="password" id="inputPasswordLogin" class="form-input" required>
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="submit" value="Inloggen" class="btn btn-default right">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</section>
</div>