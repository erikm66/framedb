<?php

	class mRegister extends Model{

		function __construct(){
			parent::__construct();
			
		}

function registrar($nom,$email,$password){
    
  try{
     $query="SELECT * FROM users WHERE email=:email";
     $this->query($query);
     $this->bind(':email',$email);
     $this->execute();
     if(($this->rowCount())==0){
            $query2="INSERT INTO `wallacopy`.`users` (`name`, `email`, `pass`) VALUES (nom=:nom, email=:email, pass=:pass)";
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

}

