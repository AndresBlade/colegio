<?php

	require_once '../../config/config.php';

	function ObtenerCargo($conn,$empleado_id){
		try{
			$sql = "SELECT cargo_id FROM empleado_cargo WHERE empleado_id=: $empleado_id";
			$stmt=$conn->prepare($sql);
			$stmt->execute();
			return  $stmt->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			return ['error' => 'Error al obtener los tipos de remuneración: ' . $e->getMessage()];
		}
	}

?>