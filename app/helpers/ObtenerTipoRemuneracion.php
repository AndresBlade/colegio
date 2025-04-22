<?php
	
	require_once '../../config/config.php';

	function obtenerTiposRemuneracion($conn){
		try{
			$sql = "SELECT id,nombre FROM tipo_remuneracion";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			return  $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return ['error' => 'Error al obtener los tipos de remuneración: ' . $e->getMessage()];

		}
	}


?>