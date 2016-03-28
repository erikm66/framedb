<aside>
<?php
		if(isset($_SESSION['islogged']) && $_SESSION['islogged']==TRUE){
			$nom =$_SESSION['email']; 
			echo '<form id="login" class="paneluser" method="post">
			<ul class="form">
			<li class="home"><i class="icon-home"></i>'.$variable.'</li>
			<li><a class="profile" href="/M-master/dashboard"><i class="icon-user"></i>Panel de control</a></li>
			<li><a class="messages" href="/M-master/carrito"><i class="icon-shopping-cart"></i>Carrito</a></li>
			<li><a class="settings" href="/M-master/ads"><i class="icon-list-alt"></i>Tus anuncios</a></li>
			<li><a class="logout" href="/M-master/home/desconectar"><i class="icon-signout"></i>Desconectar</a></li>
	</ul>
		</form>';
		
	}else{
		echo '<form id="login" class="form_log" method="post" action="/M-master/home/login">
			<div id="campos">
			<h4>Correo electronico</h4>
		<input type="text" name="nom" placeholder="Correo electronico">
		<h4>Contraseña</h4>
		<input type="password" name="pass" placeholder="Contraseña">
		</div>
		<div id="butones">
		<input type="submit" value="Login" class="loguear"><input type="button" value="Registarse" class="registro">
		</div>
		</form>
		<form id="register" class="form_reg" method="post" action="/M-master/home/registrar">
		<div id="camposreg">
		<h4>Nombre</h4><input type="text" name="nom" id="nomreg">
		<h4>Email</h4><input type="text" name="email" id="emailreg">
		<h4>Password</h4><input type="password" name="pass" id="passreg">
		<h4>Retype Password</h4><input type="password" name="pass2" id="repass">
		</div>
		<div class="message"></div>
		<div id="botonreg">
		<input type="submit" value="register" class="registro"><input type="submit" value="Login" class="loguear">
		</div>
		</form>
		
		';
	}
		?>
		</aside>

		</div>