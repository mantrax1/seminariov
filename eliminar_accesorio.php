<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

			$marca = $_POST["marca"]; // obtener parametros GET
            $tipo = $_POST["tipo"];
			
			$respuesta = SQLGlobal::cudFiltro(
				" DELETE FROM accesorio where marca=? and tipo = ? ",
				array($marca,$tipo)
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
			if($respuesta>0){
                echo json_encode(array(
                  
                    'estado' => 'se elimino el articulo ',
                    
                ));

            }else{
                echo json_encode(array(
                    
                    'estado' => 'el nombre del articulo no existe ',
                    
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