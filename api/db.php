<?php

	function getDB(){
		$dsn = 'mysql:dbname=wallacopy;host=localhost';
		$user = 'root';
		$password = '';

		try {
    	$dbh = new PDO($dsn, $user, $password);
		}		 
		catch (PDOException $e) {
    	$dbh= 'Connection failed: ' . $e->getMessage();
		}
		return $dbh;


	}
?>