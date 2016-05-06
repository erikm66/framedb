<?php

class mAds extends Model{

		function __construct(){
			parent::__construct();
			
		}

function showads(){
         $id = $_SESSION['idUsuaris'];
         $query='SELECT * FROM ads  left join rating ON ads_idads = idads  inner join users ON ads.Users_idUsuaris = idUsuaris where ads.Users_idUsuaris = ?';
         $this->stmt=$this->db->prepare($query);
         $this->stmt->bindParam(1,$id);
         //$this->query($query);
         $this->execute();
         $row=$this->resultSet();
         if(($this->rowCount())==0){
          $row=0;
         }
      return $row;
 }

   function addad($img1,$img2,$img3,$tit,$desc,$lat,$long){
      $id = $_SESSION['idUsuaris'];
        /* $query='INSERT INTO ads(Users_idUsuaris,image,image2,image3,title,description,latitud,longitud) VALUES(?,?,?,?,?,?,?,?)';
         $this->stmt=$this->db->prepare($query);
         $this->stmt->bindParam(1,$id);
         $this->stmt->bindParam(2,$img1);
         $this->stmt->bindParam(3,$img2);
         $this->stmt->bindParam(4,$img3);
         $this->stmt->bindParam(5,$tit);
         $this->stmt->bindParam(6,$desc);
         $this->stmt->bindParam(7,$lat);
         $this->stmt->bindParam(8,$long);
         //$this->query($query);
         $this->execute();
         if(($this->rowCount())==0){
          $row=0;
         }
      return $row;*/
       try{
            $query='INSERT INTO ads(Users_idUsuaris,image,image2,image3,title,description,latitud,longitud) VALUES(?,?,?,?,?,?,?,?)';
            $this->query($query);
            $this->bind(1,$id);
            $this->bind(2,$img1);
            $this->bind(3,$img2);
            $this->bind(4,$img3);
            $this->bind(5,$tit);
            $this->bind(6,$desc);
            $this->bind(7,$lat);
            $this->bind(8,$long);
            $this->execute();
           return TRUE;
    }catch(PDOException $e){
       echo "Error:".$e->getMessage();
   }
   }
  function addadpro($arr){
    try{

     $this->db->setAttribute( PDO::ATTR_AUTOCOMMIT, 0);
     $this->db->beginTransaction();
     $sql='INSERT INTO ads(iduser,image,image2,image3,title,description,latitud,longitud,) VALUES(:ideu,:image,:image2,:image3,:title,:description,:latitud,:longitud)';
     $stmt=$this->db->prepare($sql);
     $stmt->bindParam(':ideu',$arr[0], PDO::PARAM_STR);
     $stmt->bindParam(':image',$arr[1], PDO::PARAM_STR); 
     $stmt->bindParam(':image2',$arr[2], PDO::PARAM_STR);
     $stmt->bindParam(':image3',$arr[3], PDO::PARAM_STR);
     $stmt->bindParam(':title',$arr[4], PDO::PARAM_INT);
     $stmt->bindParam(':description',$arr[5], PDO::PARAM_INT);
     $stmt->bindParam(':longitud',$arr[2], PDO::PARAM_STR);
     $stmt->bindParam(':latitud',$arr[3], PDO::PARAM_STR);
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

		?>