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
  function desconectar(){
    $user=$this->model->desconectar();
    if ($user== FALSE){
    header('Location:'.APP_W.'home');
  }
}
  function busads(){
    $ad=filter_input(INPUT_POST, 'ad', FILTER_SANITIZE_STRING);
    $bus=$this->model->busads($ad);
    if ($bus!=null){
      echo "test";
      //Pasar array a json $this->json($bus)
  }
  else{
    echo "No hay coincidencias";
  }
  }

  function numpads(){
    $numads=$this->model->numpads();
    $this->json($numads);
  }

	function login(){
   if(isset($_POST['nom'])){
         $email=filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
         $password=filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
         $user=$this->model->login($email,$password);
         if ($user==TRUE){
               // cap a la pàgina principal
               if($_SESSION['rol']==1){
                $output=array('redirect'=>APP_W.'dashboard');
               $this->json($output);
               }
               else{
               $output=array('redirect'=>APP_W.'home');
               $this->json($output);
               }
                            
         }
         else{
                $output=array('incorrect');
               $this->json($output);
             }
   }
 }

 function showads(){
  $numpag=filter_input(INPUT_POST, 'npag', FILTER_SANITIZE_NUMBER_INT);
    $ads=$this->model->showads($numpag);
    if($ads!=0){
      $this->json($ads);
    }else{
      return $ads;
    }

 }

function valorad(){
  $idad=filter_input(INPUT_POST, 'idad', FILTER_SANITIZE_NUMBER_INT);
  $ads=$this->model->valorad($idad);
  if ($ads==TRUE){
    $this->ajax_set(0);
  }
  else{
    $this->ajax_set(-1);
  }
}

function registrar(){

         $nom=filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
         $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
         $password=filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
         $user=$this->model->registrar($nom,$email,$password);
         if ($user==TRUE){
               // cap a la pàgina principal
               $output=array('redirect'=>APP_W.'home');
               $this->json($output);
               //header('Location:'.APP_W.'home');
         }
         else{
             // no hi és l'usuari, cal registrar
               //header('Location:'.APP_W.'home');
                $output=array('redirect'=>APP_W.'home');
               $this->json($output);
             }
   }
 

}