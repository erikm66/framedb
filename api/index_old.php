<?php

require 'vendor/autoload.php';
\Slim\Slim::registerAutoloader();
$app=new \Slim\Slim();
//definir rutas
$app->get('/hello/:name',function($name){

	echo '<h1>Hello, '.$name.'</h1>';
});

$app->run();