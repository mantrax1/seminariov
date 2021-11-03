<?php
	require 'SQLGlobal.php';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

			
			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$memoria_ram = $_POST['memoria_ram'];
            $memoria_inter = $_POST['memoria_inter'];
            $camara_delantera =$_POST['camara_delantera'];
            $camara_trasera = $_POST['camara_trasera'];
            $stock = $_POST['stock'];
            $precio = $_POST['precio'];
			


			$respuesta = SQLGlobal::cudFiltro(

				"INSERT INTO celulares (marca,modelo,memoria_ram,memoria_inter,camara_delantera,camara_trasera,stock,precio) 
				VALUES (?,?,?,?,?,?,?,?)",
				array($marca,$modelo,$memoria_ram,$memoria_inter,$camara_delantera,$camara_trasera,$stock,$precio)
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
		//carga de datos para la proxima tabla de Usuarios

?>
 