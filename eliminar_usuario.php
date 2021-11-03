<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

			$nombre = $_POST["nombre"]; // obtener parametros GET
            $email = $_POST["email"];
			
			$respuesta = SQLGlobal::cudFiltro(
				" DELETE FROM usuarios where nombre=? and email = ? ",
				array($nombre,$email)
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
			if($respuesta>0){
                echo json_encode(array(
                  
                    'estado' => 'se elimino el usuario ',
                    
                ));

            }else{
                echo json_encode(array(
                    
                    'estado' => 'el nombre del usuario no existe ',
                    
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