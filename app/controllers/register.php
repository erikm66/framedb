<?php
	
	class Register extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mRegister();
			$this->view= new vRegister();
		}

		function registrar(){
   		if(isset($_POST['nom'])){
   		 $nom=filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
         $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
         $password=filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
         $user=$this->model->registrar($nom,$email,$password);
         if ($user== TRUE){
               // cap a la pàgina principal
               header('Location:'.APP_W.'home');
         }
         else{
             // no hi és l'usuari, cal registrar
               header('Location:'.APP_W.'falso');
             }
   }
 }
	}
