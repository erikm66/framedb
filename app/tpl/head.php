<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
    <link rel="stylesheet"  type="text/css" href="<?= APP_W.'pub/css/m.css'; ?>">
    <script src="<?= APP_W.'pub/js/jquery.min.js';?>"></script>
    <script src="<?= APP_W.'pub/js/app.js';?>"></script>
</head>
<body>
	<header>
		<h1> View -<?= $title; ?></h1>
		<form id="login" method="post" action="<?= APP_W.'home/login'; ?>">
		<label>Email</label><input type="text" name="nom">
		<br>
		<label>Password</label><input type="password" name="pass">
		<br>
		<input type="submit" value="Login"><input type="button" value="Olvide mi contraseña">
		</form>
	</header>
	
