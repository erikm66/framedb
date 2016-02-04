<?php
	
	class Home extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mHome();
			$this->view= new vHome();
			
			//echo 'Hello controller!';
		}
		function home(){
			//Coder::codear($this->conf);
	}
	function login(){
   if(isset($_POST['nom'])){
         $email=filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
         $password=filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
         $user=$this->model->login($email,$password);
         if ($user== TRUE){
               // cap a la pàgina principal
               header('Location:'.APP_W.'home');
         }
         else{
             // no hi és l'usuari, cal registrar
               header('Location:'.APP_W.'home');
             }
   }
 }
}