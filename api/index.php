<?php
/*
$app = \Slim\Slim::getInstance();
$app->response->setStatus(200);
$app->response->headers->set('Content-Type','application/json');
echo json-encode($result);
*/
require 'vendor/autoload.php';
require 'db.php';
\Slim\Slim::registerAutoloader();
$app=new \Slim\Slim();
//definir rutas
$app->get('/users/','users');
$app->post('/users/','insertusers');
	function users(){
		$sql = "SELECT * FROM users";
		$dbh = getDB();
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$app = \Slim\Slim::getInstance();
		$app->response->setStatus(200);
		$app->response->headers->set('Content-Type','application/json');
		echo json_encode($result);
	} 
	function insertusers(){
			$sql = "INSERT INTO users(name,email,pass,rol) VALUES(:nom,:email,:pass,:rol)";
			$request = \Slim\Slim::getInstance()->request();
			$user = $request->params();
			$nom=$user["name"];
			$email=$user["email"];
			$password=$user["pass"];
			$rol=$user["rol"];
			try{
				$dbh = getDB();
            	$stmt = $dbh->prepare($sql);
           		$stmt->bindParam(':nom',$nom);
           		$stmt->bindParam(':email',$email);
            	$stmt->bindParam(':pass',$password);
            	$stmt->bindParam(':rol',$rol);
				$stmt->execute();
				echo 'correcto mah nigga';
			}
			catch(Exception $e){
				echo "error";
			}
		
		
	}

$app->run();
