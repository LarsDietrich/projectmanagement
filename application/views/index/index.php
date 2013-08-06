<form id="register" method="POST" action="/user/register">
	<fieldset>
		<ul>
			<li>
				<label for="first-name">First Name:</label>
				<input id="first-name" type="text" name="first_name">
			</li>
			<li>
				<label for="last-name">Last Name:</label>
				<input id="first-name" type="text" name="last_name">
			</li>
			<li>
				<label for="email">E-mail:</label>
				<input id="email" type="text" name="email">
			</li>
			<li>
				<label for="password">Password:</label>
				<input id="password" type="password" name="password">
			</li>
			<li>
				<label for="password-confirm">Confirm Password:</label>
				<input id="password-confirm" type="password" name="password_confirm">
			</li>
		
		</ul>
	</fieldset>
	<fieldset class="buttons">
       	<input type="submit" name="submit" value="Register">
    </fieldset>
</form>