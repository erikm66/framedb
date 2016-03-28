<?php 
	$variable = "Panel de control";
	
	if($_SESSION['rol']==1){
		echo '<div id="dashb"><h3 id="negro">Administración usuarios</h3><div id="moduser"><input type="button" method="post" value="eliminar" id="eliminar">
		<input type="button" method="post" value="actualizar" id="actualizar"><input type="button" id="addregistro" value="Añadir usuario"></div><div id="updateb">
Nombre actualizar<input type="text" id="nameup">
Password actualizar<input type="text" id="passup">
Email<input type="text" id="emailup">
Rol<input type="text" id="rolup">
<input type="button" method="post" value="update" id="update">
</div>
<div id="adduser">Nombre <input type="text" id="nameadd">
Password <input type="text" id="passadd">
Email<input type="text" id="emailadd">
Rol<input type="text" id="roladd">
<input type="button" method="post" value="insert" id="insertar"></div>
		<div id="consultar"></div></div>';
	}
	else{
		echo '<div id="dashb"><form id="actualizar">Nombre actualizar<input type="text" id="nameup">
Password actualizar<input type="text" id="passup">
Email<input type="text" id="emailup">
<input type="button" method="post" value="update" id="update"></form></div>
';

	}
	/*$query="SELECT * FROM users";
    		 $this->query($query);
     		 $this->execute();
     		 $resultado=$this->resultSet();
     		 $i=0;
     		 echo '<table>';
		while($resultado.length()>$i){
 			echo '<tr><td>'.$resultado[$i]['name'].'</td><td>'.$resultado[$i]['pass'].'</td><td>'.$resultado[$i]['email'].'</td><td>'.$resultado[$i]['rol'].'</td>';
 			
	}
	echo '</table>';*/
	?>
