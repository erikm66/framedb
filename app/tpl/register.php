

	<div class="container">
		<article>
			<h1>Registro</h1>
			<form id="register" method="post" action="<?= APP_W.'register/registrar'; ?>">
		<label>Nombre</label><input type="text" name="nom">
		<br>
		<label>Email</label><input type="text" name="email">
		<br>
		<label>Password</label><input type="password" name="pass">
		<br>
		<label>Retype Password</label><input type="password" name="pass2">
		<br>
		<input type="submit" value="register">
		</form>
		</article>
	</div>