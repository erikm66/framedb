<?php
	
	class Dashboard extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mDashboard();
			$this->view= new vDashboard();
			
			//echo 'Hello controller!';
		}
		function home(){
			//Coder::codear($this->conf);
	}

		function selectuser(){
			 $resultado=$this->model->selectuser();
			$this->json($resultado);
			 
		}

		function deleteuser(){

			foreach ($_POST['idusers'] as $key => $value) {
				$this->model->deleteuser($value);
			}
			 return 0;
			 
		}

		function updateuser(){
			$idusers=filter_input(INPUT_POST, 'idusers', FILTER_SANITIZE_NUMBER_INT);
			$nom=filter_input(INPUT_POST, 'nameup', FILTER_SANITIZE_STRING);
         	$email=filter_input(INPUT_POST, 'emailup', FILTER_SANITIZE_STRING);
         	$password=filter_input(INPUT_POST, 'passup', FILTER_SANITIZE_STRING);
         	$rol=filter_input(INPUT_POST, 'rolup', FILTER_SANITIZE_NUMBER_INT);
			$resultado=$this->model->updateuser($idusers,$nom,$email,$password,$rol);
			 return 0;
			 
		}
		function insert(){

         $nom=filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
         $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
         $password=filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
         $rol=$_POST['rol']; 
         $user=$this->model->insert($nom,$email,$password,$rol);
         if ($user==TRUE){
               // cap a la pàgina principal
               $output=array('redirect'=>APP_W.'dashboard');
               $this->json($output);
               //header('Location:'.APP_W.'home');
         }
         else{
             // no hi és l'usuari, cal registrar
               //header('Location:'.APP_W.'home');
                $output=array('redirect'=>APP_W.'dashboard');
               $this->json($output);
             }
   }

/**/
}

/*echo '<table id="contentable">';
			 while(sizeof($resultado)>$i){
 			echo '<tr><td>'.$resultado[$i]['name'].'</td><td>'.$resultado[$i]['pass'].'</td><td>'.$resultado[$i]['email'].'</td><td>'.$resultado[$i]['rol'].'</td>';
 			$i++;
 			}
 			echo '</table>';*/