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
 

function addad($arr){
    try{

     $this->db->setAttribute( PDO::ATTR_AUTOCOMMIT, 0);
     $this->db->beginTransaction();
     $sql='INSERT INTO ads(iduser,image,image2,image3,title,description) VALUES(:ideu,:image,:image2,:image3,:title,:description)';
     $stmt=$this->db->prepare($sql);
     $stmt->bindParam(':ideu',$arr[0], PDO::PARAM_STR);
     $stmt->bindParam(':image',$arr[1], PDO::PARAM_STR); 
     $stmt->bindParam(':image2',$arr[2], PDO::PARAM_STR);
     $stmt->bindParam(':image3',$arr[3], PDO::PARAM_STR);
     $stmt->bindParam(':title',$arr[4], PDO::PARAM_INT);
     $stmt->bindParam(':description',$arr[5], PDO::PARAM_INT);
     $res=$stmt->execute();
     $this->db->setAttribute( PDO::ATTR_AUTOCOMMIT, 1);
     $this->db->commit();
     if ($res){
         return 1;
      } else {
       return 0;}
    }catch(PDOException $e){
          $this->db->rollback();
          print $e->getMessage();
   }

}

}