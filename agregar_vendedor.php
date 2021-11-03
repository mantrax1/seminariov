<?php
	require 'SQLGlobal.php';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
            $edad = $_POST['edad'];
            $email = $_POST['email'];
            $contrasenia = $_POST['contrasenia'];
			$respuesta = SQLGlobal::cudFiltro(
						//(nombre,apellido,dni,email,edad,contraseña) 
				"INSERT INTO vendedor (nombre,apellido,edad,email,contraseña) VALUES (?,?,?,?,?)",
				array($nombre,$apellido,$edad,$email,$contrasenia)
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")

			if($respuesta>0){

				echo "los datos se guardaron los datos";
			}else {
				echo json_encode(array(
					'respuesta'=>'100',
					'estado' => 'no se pudo registrar correctamente los datos',
					'data'=> $respuesta,
					'error'=>''
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