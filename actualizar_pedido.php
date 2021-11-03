<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

			 // obtener parametros GET

			$email = $_POST["email"];
			$modelo = $_POST["modelo"];
            $comentario = $_POST['comentario'];
			$respuesta = SQLGlobal::cudFiltro(
				"UPDATE pedido SET comentario= ? WHERE email = ? and modelo= ?",
				array($comentario,$email,$modelo)
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
			if($respuesta>0){
				echo json_encode(array(
					'respuesta'=>'200',
					'estado' => 'Se actualizo correctamente el pedido',
					'data'=>$respuesta,
					'error'=>''
				));

			}else{
				echo json_encode(array(
					'respuesta'=>'100',
					'estado' => 'no se pudo actualizar el pedido',
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