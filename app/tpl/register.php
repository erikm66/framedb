

	
		<article>
			<h1>Registro</h1>
			<form id="register" class="form_reg" method="post" action="<?= APP_W.'register/registrar'; ?>">
		<label>Nombre</label><input type="text" name="nom">
		<br>
		<label>Email</label><input type="text" name="email">
		<br>
		<label>Password</label><input type="password" name="pass" id="pass">
		<br>
		<label>Retype Password</label><input type="password" name="pass2" id="repass">
		<br>
		<input type="submit" value="register">
		</form>
		<div class="message"></div>
		</article>
	</div>