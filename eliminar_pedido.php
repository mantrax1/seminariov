<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

			$modelo = $_POST["modelo"]; // obtener parametros GET
            $marca = $_POST["marca"];
			$email = $_POST['email'];
			$respuesta = SQLGlobal::cudFiltro(
				" DELETE FROM pedido where modelo=? and marca = ? and email = ? ",
				array($modelo,$marca)
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
			if($respuesta>0){
                echo json_encode(array(
                  
                    'estado' => 'se elimino el pedido ',
                    
                ));

            }else{
                echo json_encode(array(
                    
                    'estado' => 'el nombre del pedido no existe ',
                    
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