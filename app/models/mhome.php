<?php

	class mHome extends Model{

		function __construct(){
			parent::__construct();
			
		}

	function login($email,$password){
    
  try{
     $query="SELECT * FROM users WHERE email=:email AND pass=:pass";
     $this->query($query);
     $this->bind(':email',$email);
     $this->bind(':pass',$password);
     $this->execute();
     if(($this->rowCount())==1){
           Session::set('islogged',TRUE);
           Session::set('email',$email);
           return TRUE;

     }
     else {
         Session::set('islogged',FALSE);
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}
	}