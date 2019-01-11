<?php 
	require('./conector.php');
$con = new ConectorBD();
if(  $con->initConexion($con->database) == 1049){
  $conexion['msg'] = "Creando base de datos ".$con->database;
  $database = $con->newDatabase();
    if ($database != "OK"){
      $conexion['msg'] = "<h6><b>Error : </b></h6></br>El usuario <b>'$con->user'</b> no existe o no posee permisos <b>$con->database</b>. "; //Mostrar mensaje
    }else{
        $conexion['database'] = "OK"; 
        $conexion['msg'] = "Base de datos creada con éxito";
    }
  }else{    
    $conexion['database'] = "OK";
    $conexion['msg'] = "Base de datos <b>".$con->database."</b> encontrada"; //Mensaje de descripción de acción
}
 echo json_encode($conexion);
 ?>php