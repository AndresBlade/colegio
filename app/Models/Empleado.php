<?php
require_once 'Usuario.php';
class Empleado extends Usuario
{
    public string $nombre;
    public string $fecha_ingreso;
    public array $cargos; //EmpleadoCargo[]
    public function __construct(string $nombre, string $fecha_ingreso, array $cargos)
    {
        $this->nombre = $nombre;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->cargos = $cargos;
    }
}
?>