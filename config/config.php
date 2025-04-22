<?php 

	$host = 'localhost';
	$user ='root';
	$password = '';
	$dbname = 'colegio';

	try {
		// Crear conexión usando PDO
		$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
		$conn = new PDO($dsn, $user, $password);
	
		// Configurar el modo de error de PDO
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	} catch (PDOException $e) {
		// Manejar errores de conexión
		die("Conexión fallida: " . $e->getMessage());
	}
	

?>