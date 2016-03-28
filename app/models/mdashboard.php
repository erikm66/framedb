<?php

class mDashboard extends Model{

		function __construct(){
			parent::__construct();
			
		}

		

		function selectuser(){

			$query="SELECT * FROM users";
    		 $this->query($query);
     		 $this->execute();
     		 $row=$this->resultSet();
 			return $row;
 			}

 		function deleteuser($idusers){
			$query="DELETE FROM users
			WHERE idUsuaris =:iduser";
			$this->query($query);
			$this->bind(':iduser',$idusers);
     		$this->execute();
 			return 0;
 			}
 		function updateuser($idusers,$usernameup,$emailup,$mipasswordup,$rolup){
			if($usernameup!=null){
			$query="UPDATE users
			SET name = :nameup  WHERE idUsuaris =:iduser";
			$this->query($query);
			$this->bind(':nameup',$usernameup);
			$this->bind(':iduser',$idusers);
     		$this->execute();
			}
			if($mipasswordup!=null){
			$query="UPDATE users
			SET pass = :passup  WHERE idUsuaris =:iduser";
			$this->query($query);
			$this->bind(':passup',$mipasswordup);
			$this->bind(':iduser',$idusers);
     		$this->execute();
			}
     		if($emailup!=null){
			$query="UPDATE users
			SET email = :emailup WHERE idUsuaris =:iduser";
			$this->query($query);
			$this->bind(':emailup',$emailup);
			$this->bind(':iduser',$idusers);
     		$this->execute();
			}
			if($rolup!=null){
			$query="UPDATE users
			SET rol = :rolup WHERE idUsuaris =:iduser";
			$this->query($query);
			$this->bind(':rolup',$rolup);
			$this->bind(':iduser',$idusers);
     		$this->execute();
			}
 			return 0;
 			}

 			function insert($nom,$email,$password,$rol){
    
  try{
     $query="SELECT * FROM users WHERE email=:email";
     $this->query($query);
     $this->bind(':email',$email);
     $this->execute();
     if(($this->rowCount())==0){
            $query2="CALL insert_admin(:nom, :email, :pass, :rol)";
            $this->query($query2);
            $this->bind(':nom',$nom);
            $this->bind(':email',$email);
            $this->bind(':pass',$password);
            $this->bind(':rol',$rol);
            $this->execute();
           return TRUE;

     }
     else {
          return FALSE;}
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
}
		
}
		?>