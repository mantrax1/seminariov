<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

			$nombre = $_POST["nombre"]; // obtener parametros GET
			
			$respuesta = SQLGlobal::cudFiltro(
				" DELETE FROM articulos where nombre=?",
				array($nombre)
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
			if($respuesta>0){
                echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'se elimino el articulo ',
                    'data'=>$respuesta,
                    'error'=>''
                ));

            }else{
                echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'el nombre del articulo no existe ',
                    'data'=>$respuesta,
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

?>