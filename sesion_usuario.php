<?php
	require 'SQLGlobal.php';
	session_start();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

			$nombre = $_POST["nombre"]; // obtener parametros post
			$email = $_POST["email"];
	
		
			$respuesta = SQLGlobal::selectArrayFiltro(
				"SELECT * FROM usuarios WHERE  nombre = ? AND email=? ",
				array($nombre,$email)
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
			 if($respuesta > 0){
				
				 echo json_encode(array(
					'BIENVENIDO'
					
					));
			}
			else{
				echo json_encode(array(
				   'estado' => 'datos incorrectos',
				   
				   ));

			}
		}catch(PDOException $e){
			echo json_encode(
				array(
					'respuesta'=>'-1',
					'estado' => 'Ocurrio un error, intentelo mas tarde',
					'data'=>'',
					'error'=>$e->getMessage())
			);
		}
	}

?>