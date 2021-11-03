<?php
	require 'SQLGlobal.php';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

			
			$nombre = $_POST['nombre'];
			$modelo = $_POST['modelo'];
			$presentacion = $_POST['presentacion'];
			
			$respuesta = SQLGlobal::cudFiltro(
				"INSERT INTO articulo (modelo,nombre,presentacion) 
				VALUES (?,?,?)",
				array($modelo,$nombre,$presentacion)

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
	
?>