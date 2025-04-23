<?php
require_once '../../config/config.php';

class PeticionPrestamoController{
	private $conn;

	public function __construct($dbConnection){
		$this->conn = $dbConnection;
	}
	public function crearPeticionPrestamo($data){
		if (
            empty($data['empleado_id']) ||
            empty($data['cargo_id']) ||
            empty($data['tipo_remuneracion_id']) ||
            empty($data['monto'])
        ) {
 // Redirigir con un mensaje de error
			header('Location: ../../app/Views/PeticionPrestamosVista.php?error=1');
			exit();
		}
		try {
            // Preparar la consulta SQL
            $sql = "INSERT INTO peticion_prestamo (empleado_id, cargo_id, tipo_remuneracion_id, aceptada, monto)
                    VALUES (:empleado_id, :cargo_id, :tipo_remuneracion_id, :aceptada, :monto)";
            $stmt = $this->conn->prepare($sql);

            // Vincular los parámetros
            $stmt->bindParam(':empleado_id', $data['empleado_id'], PDO::PARAM_INT);
            $stmt->bindParam(':cargo_id', $data['cargo_id'], PDO::PARAM_INT);
            $stmt->bindParam(':tipo_remuneracion_id', $data['tipo_remuneracion_id'], PDO::PARAM_INT);
            $stmt->bindParam(':aceptada', $data['aceptada'], PDO::PARAM_BOOL);
            $stmt->bindParam(':monto', $data['monto'], PDO::PARAM_STR);

            // Ejecutar la consulta
            $stmt->execute();

            return ['success' => 'Petición de préstamo creada exitosamente.'];
        } catch (PDOException $e) {
            return ['error' => 'Error al crear la petición de préstamo: ' . $e->getMessage()];
        }
    }
	public function obtenerPeticionPrestamo($empleado_id){
		try{
			
			$sql = "SELECT * FROM peticion_prestamo WHERE empleado_id = :empleado_id";

			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(':empleado_id',$empleado_id, PDO::PARAM_INT);

			$stmt->execute();

			$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $resultados;
		}catch(PDOException $e){
			return ['error' => 'Error al obtener los préstamos: ' . $e->getMessage()];
		}
	}
	public function borrarPeticionPrestamo($id){
		try{
			$sqlCheck = "SELECT COUNT(*) FROM peticion_prestamo WHERE id=:id";
			$stmtCheck = $this->conn->prepare($sqlCheck);
			$stmtCheck->bindParam(':id',$id,PDO::PARAM_INT);
			$stmtCheck->execute();
			$exists = $stmtCheck->fetchColumn();

			if($exists == 0){
				return ['error'=> 'La petición no existe o ya fue eliminada'];
			}

			
			$sql = "DELETE FROM peticion_prestamo WHERE id=:id";

			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(':id',$id,PDO::PARAM_INT);

			$stmt->execute();

			 // Verificar si la eliminación fue exitosa
			if ($stmt->rowCount() > 0) {
				return ['success' => 'La petición de préstamo fue eliminada exitosamente.'];
			} else {
				return ['error' => 'No se pudo eliminar la petición de préstamo.'];
			}
			} catch (PDOException $e) {
				return ['error' => 'Error al eliminar la petición de préstamo: ' . $e->getMessage()];
			}
		}
	}


	// Ejemplo de uso
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$controller = new PeticionPrestamoController($conn);
		// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// 	var_dump($_POST); // Depurar los datos enviados
		// 	exit();
		// }
		if(isset($_POST['_method']) && $_POST['_method'] === 'DELETE'){
			$id = $_POST['id'] ?? null;
			$resultado = $controller->borrarPeticionPrestamo($id);
			
			if (isset($resultado['success'])) {
				header('Location: ../../app/Views/PeticionPrestamosVista.php?success=2');
				exit();
			} else {
				header('Location: ../../app/Views/PeticionPrestamosVista.php?error=3');
				exit();
			}

		}else{

			// Capturar los datos enviados desde el formulario
			$data = [
				'empleado_id' => $_POST['empleado_id'] ?? null,
				'cargo_id' => $_POST['cargo_id'] ?? null,
				'tipo_remuneracion_id' => $_POST['tipo_remuneracion_id'] ?? null,
				'aceptada' => $_POST['aceptada'] ?? false,
				'monto' => $_POST['monto'] ?? null,
			];

			// Llamar al método para crear la petición
			$resultado = $controller->crearPeticionPrestamo($data);

			// Redirigir o mostrar un mensaje según el resultado
			if (isset($resultado['success'])) {
				header('Location: ../../app/Views/PeticionPrestamosVista.php?success=1');
				exit();
			} else {
				echo '<div class="alert alert-danger">' . $resultado['error'] . '</div>';
			}
		}

	}


?>