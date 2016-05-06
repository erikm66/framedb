<?php

	class mHome extends Model{

		function __construct(){
			parent::__construct();
			
		}

function desconectar(){
    Session::destroy();
    return FALSE;
  }

  function busads($ad){
    $query="SELECT * FROM ads WHERE title like:ad";
     $this->query($query);
     $this->bind(':ad',$ad);
     $this->execute();
     if(($this->rowCount())==1){
       $ads = $this->resultSet();
      return $ads;
     }
     else{
      return 0;
     }
  }

	function login($email,$password){
    
  try{
     $query="SELECT * FROM users WHERE email=:email AND pass=:pass";
     $this->query($query);
     $this->bind(':email',$email);
     $this->bind(':pass',$password);
     $this->execute();
     if(($this->rowCount())==1){
           $query='SELECT rol,email,name,idUsuaris FROM `users` WHERE email=:email';
           $this->query($query);
           $this->bind(':email',$email);
           $this->execute();
           $rol=$this->resultSet();
           Session::set('email',$email);
           Session::set('idUsuaris',$rol[0]['idUsuaris']);
           Session::set('rol',$rol[0]['rol']);
           Session::set('islogged',TRUE);
            Session::set('test');
            $_SESSION['test']=new User($rol[0]['name'],$rol[0]['rol'],$email);
           setcookie("email", $rol[0]['email']);
           setcookie("rol", $rol[0]['rol']);
           return TRUE;
     }
     else {
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}

 function showads($numpag){
         $numpag2=$numpag+10;
         $query='SELECT DISTINCT idads,latitud,longitud,title,description,image,rating 
         FROM ads left join rating ON ads_idads = idads limit '.$numpag.','.$numpag2;
         $this->query($query);
         $this->execute();
         $row=$this->resultSet();
         if(($this->rowCount())==0){
          $row=0;
         }
      return $row;
 }

 function numpads(){
  $query='SELECT COUNT(*)/10 as numeropaginas from ads';
         $this->query($query);
         $this->execute();
         $row=$this->resultSet();
      return $row;
 }

function registrar($nom,$email,$password){
    
  try{
     $query="SELECT * FROM users WHERE email=:email";
     $this->query($query);
     $this->bind(':email',$email);
     $this->execute();
     if(($this->rowCount())==0){
            $query2="CALL insert_user(:nom, :email, :pass)";
            $this->query($query2);
            $this->bind(':nom',$nom);
            $this->bind(':email',$email);
            $this->bind(':pass',$password);
            $this->execute();
           Session::set('isregistered',TRUE);
           Session::set('email',$email);
           return TRUE;

     }
     else {
         Session::set('isregistered',FALSE);
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}

function valorad($idad){
try{ 
            $id = $_SESSION['idUsuaris'];
            $query='INSERT INTO `rating`( `rating`, `ads_idads`, `users_idUsuaris`) VALUES(?,?,rating+1)';
            $this->query($query);
            $this->bind(1,$idad);
            $this->bind(2,$id);
            $this->execute();
           return TRUE;
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
}
}

}
