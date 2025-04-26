<?php
	class PeticionPrestamo{
		public int $id;
		public int $empleadoId;
		public int $cargoId;
		public int $tipoRemuneracion;
		public bool $aceptada;
		public float $monto;

		public function __construct(
			int $id,
			int $empleadoId,
			int $cargoId,
			int $tipoRemuneracion,
			bool $aceptada,
			float $monto,
		){
			$this->id=$id;
			$this->empleadoId=$empleadoId;
			$this->cargoId=$cargoId;
			$this->tipoRemuneracion=$tipoRemuneracion;
			$this->aceptada=$aceptada;
			$this->monto=$monto;
		}
		public function validar(){
			return !empty($this->empleadoId) && !empty($this->cargoId) && !empty ($this->tipoRemuneracion)&& !empty($this->monto);
		}
		public function estado():string{
			return $this->aceptada ? 'Aceptada' : 'Rechazada';
		}
		public function __destruct(){
			echo "El objeto PeticionPrestamo con ID {$this->id} ha sido destruido.<br>";
		}
	}
?>