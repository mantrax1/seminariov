<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='GET'){
		try{
			//$id = $_GET['id']; // obtener parametros GET
			$respuesta = SQLGlobal::selectArray("SELECT *FROM pedido ");//sin filtro ("No incluir filtros ni '?'")			
			print json_encode($respuesta, JSON_UNESCAPED_UNICODE); 
			
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