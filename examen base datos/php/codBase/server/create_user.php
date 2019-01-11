<?php
	require('conector.php');
	$con = new conectorBD();

	$response['conexion'] = $con->initConexion($con->database);
	if ($response['conexion'] == 'OK'){
		$conexion = $con->getConexion();
		$insert = $conexion->prepare('INSERT INTO usuarios (email, nombre, password , fecha_nacimiento) VALUES (?,?,?,?)');
		$insert->bind_param("ssss", $email, $nombre, $password, $fecha_nacimiento);

		$d_password = "123456789";
		$email = "pepe@mail.com";
		$nombre = "pepito";
		$password = password_hash($d_password, PASSWORD_DEFAULT);
		$fecha_nacimiento = "1987-12-08";

		$insert->execute();

		$email = 'alison@mail.com';
		$nombre = 'alison';
		$password = password_hash($d_password, PASSWORD_DEFAULT);
		$fecha_nacimiento = '1986-12-03';

		$insert->execute();

		$email = 'nicole@mail.com';
		$nombre = 'nicole';
		$password = password_hash($d_password, PASSWORD_DEFAULT);
		$fecha_nacimiento = '2018-02-09';

		$insert->execute();
		$response['resultado'] = "1";
		$response['msg']= 'Informacio de inicio:';
		$getUsers = $con->consultar(['usuarios'],['*'],$condicion = "");
		while ($fila= $getUsers->fetch_assoc()) {
			$response['msg'].=$fila['email'];
		}
		$response['msg'].= 'contraenia: '.$d_password;
		}else{
			$response['resultado'] == "0";
			$response['msg'] = 'No se pudo conectar a la base de datos';
		}
		echo json_encode($response);

 ?>
