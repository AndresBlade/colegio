<?php 
	require_once '../../config/config.php';
	require_once '../../app/Controllers/PeticionPrestamoController.php';
	require_once '../../app/helpers/ObtenerTipoRemuneracion.php';
	require_once '../../app/helpers/ObtenerCargo.php';

	$controller = new PeticionPrestamoController($conn);
	// ID del empleado (puedes obtenerlo de la sesión o de un parámetro GET)
	$empleado_id = $_GET['empleado_id'] ?? 1; // Por defecto, empleado_id = 1

	$prestamos = $controller->obtenerPeticionPrestamo($empleado_id);

	$tiposRemuneracion = obtenerTiposRemuneracion($conn);

	$cargo = ObtenerCargo($conn,$empleado_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Petición Prestamo</title>
	<link rel="stylesheet" href="../../public/assets/boostrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../public/assets/DataTables/datatables.min.css" >
</head>
<body class="bg-light">
	<div class="container  max-w">
        <h1 class="text-center mt-5 text-primary">Formulario de Petición de Préstamo</h1>
    </div>
	<button class="btn btn-success btn-lg ml-5" data-bs-toggle="modal" data-bs-target="#exampleModal"> Petición </button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Petición</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del modal -->
                    <form action="../../app/Controllers/PeticionPrestamoController.php" method="POST">
					<div class="mb-3">
						<label for="empleado_id" class="form-label">Empleado</label>
						<!-- Valor por defecto para empleado_id -->
						<input type="number" class="form-control" id="empleado_id" name="empleado_id" value="1" required>
						</div>
						<div class="mb-3">
							<label for="cargo_id" class="form-label">Cargo</label>
							<!-- Valor por defecto para cargo_id -->
							<input type="number" class="form-control" id="cargo_id" name="cargo_id" value="1" required>
						</div>
						<div class="mb-3">
							<label for="tipo_remuneracion_id" class="form-label">Tipo de Remuneración</label>
							<select name="tipo_remuneracion_id" id="tipo_remuneracion_id" class="form-select" required>
								<?php if(!empty($tiposRemuneracion) && !isset($tiposRemuneracion['error'])): ?>
									<?php foreach($tiposRemuneracion as $tipo):?>
										<option value="<?php echo $tipo['id'];?>"><?php echo $tipo['nombre']?></option>
									<?php endforeach;?>
									<?php else: ?>
								<option value="">No hay tipos de remuneración disponibles</option>
							<?php endif; ?>
							</select>
						</div>
						<div class="mb-3">
							<label for="monto" class="form-label">Monto</label>
							<input type="number" step="1.00" class="form-control" id="monto" name="monto" required>
						</div>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</form>
                </div>
            </div>
        </div>
    </div>
	<table id="myTable" class="table table-striped table-bordered mt-4 mx-auto bg-white" style="width:90%">
		<thead>
			<tr>
				<th>Tipo de Remuneración</th>
				<th>Aceptada</th>
				<th>Monto</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($prestamos) && !isset($prestamos['error'])) : ?>
				<?php foreach ($prestamos as $prestamo):?>
					<tr>
						<td class="d-none"><input type="hidden" value="<?php echo $prestamo['id']?>"></td>
						<td><?php echo $prestamo['tipo_remuneracion_id'] === 1 ? 'Bono Complementario' : ($prestamo['tipo_remuneracion_id'] === 2 ? 'Bono de Alimentación' : ($prestamo['tipo_remuneracion_id'] === 3 ? 'Aguinaldo' : 'Sueldo')); ?></td>
						<td class="<?php echo $prestamo['aceptada'] ? 'text-white bg-success' : 'text-white bg-danger'?>"><?php echo $prestamo['aceptada'] ? 'Sí' : 'No'; ?></td>
						<td><?php echo $prestamo['monto']; ?></td>
						<td>
							<form action="../Controllers/PeticionPrestamoController.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta petición?');">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="id" value="<?php echo $prestamo['id']; ?>">
								<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>

							</form>
						</td>
					</tr>
				<?php endforeach;?>	
			<?php else: ?>
				<tr>
					<td colspan="5" class="text-center">No se encontraron préstamos para este empleado.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
		<div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="alerta">
			<strong>Éxito:</strong> La petición de préstamo se guardó correctamente.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php elseif (isset($_GET['success']) && $_GET['success'] == 2): ?>
		<div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="alerta">
			<strong>Éxito:</strong> La petición de préstamo fue eliminada correctamente.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>

	<?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
		<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" id="alerta">
			<strong>Error:</strong> Todos los campos son obligatorios.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php elseif (isset($_GET['error']) && $_GET['error'] == 3): ?>
		<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" id="alerta">
			<strong>Error:</strong> No se pudo eliminar la petición de préstamo. Inténtalo de nuevo.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php endif; ?>
		

	<script src="../../public/assets/boostrap/js/bootstrap.bundle.min.js"></script>
	<script src="../../public/assets/DataTables/datatables.min.js"></script>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#myTable');
        });

		document.addEventListener('DOMContentLoaded',function(){
			const alerta = document.getElementById('alerta');
			console.log(alerta)
			if(alerta){
				setTimeout(() => {
					alerta.classList.remove('show');
					alerta.classList.add('fade');
					setTimeout(() => {
						alerta.remove()
					}, 500);
				}, 3000);
			}
		})
		// Eliminar los parámetros de la URL después de mostrar la alerta
        const url = new URL(window.location.href);
        url.searchParams.delete('success');
        url.searchParams.delete('error');
        window.history.replaceState({}, document.title, url.toString());
		
	</script>

</body>
</html>



