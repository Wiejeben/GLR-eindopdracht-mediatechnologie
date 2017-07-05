<div class="container_12">
	<section class="user-module grid_4 {{ (isset($embed) && $embed === true) ? 'prefix_1' : 'prefix_4' }}">
		<div class="user-header">
			<h1 class="text-center font-large white">Registreren</h1>
			<?php if(Session::has('message')):?>
				<div class="alert alert-warning">
					{{ Session::flash('message') }}
				</div>
			<?php endif;?>
		</div>
		<form method="post" action="{{ url('auth/register') }}">
			<table class="table">
				<tbody>
					<tr>
						<td>
							<label for="inputEmailRegister" class="form-label">E-mailadres: </label>
						</td>

						<td>
							<input type="email" name="email" id="inputEmailRegister" class="form-input" required autofocus>
						</td>
					</tr>
					<tr>
						<td>
							<label for="inputPasswordRegister" class="form-label">Wachtwoord: </label>
						</td>

						<td>
							<input type="password" name="password" id="inputPasswordRegister" class="form-input" required>
						</td>
					</tr>
					<tr>
						<td>
							<label for="inputPasswordRepeatRegister" class="form-label">Wachtwoord bevestigen: </label>
						</td>

						<td>
							<input type="password" name="password_repeat" id="inputPasswordRepeatRegister" class="form-input" required>
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<h2 class="text-center font-large white mt-15">Adresgegevens</h2>
						</td>
					</tr>

					<tr>
						<td>
							<label for="inputNameRegister" class="form-label">Naam: </label>
						</td>

						<td>
							<input type="text" name="name" id="inputNameRegister" class="form-input" required autofocus>
						</td>
					</tr>

					<tr>
						<td>
							<label for="inputCityRegister" class="form-label">Plaats: </label>
						</td>

						<td>
							<input type="text" name="city" id="inputCityRegister" class="form-input" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="inputStreetRegister" class="form-label">Straat + Huisnummer: </label>
						</td>

						<td>
							<input type="text" name="street" id="inputStreetRegister" class="form-input" required>
						</td>
					</tr>

					<tr>
						<td>
							<label for="inputZipcodeRegister" class="form-label">Postcode: </label>
						</td>

						<td>
							<input type="text" name="zipcode" id="inputZipcodeRegister" class="form-input" required>
						</td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="submit" value="Registreer" class="btn btn-default right">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</section>
</div>