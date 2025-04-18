<?php
require_once 'Cargo.php';
class EmpleadoCargo
{
    public Cargo $cargo;
    public array $prestamos; //Prestamo[]
    public float $salario;
    public ?array $diasLaborables; //DiaLaborable[] si es personal por horas
    public array $inasistencias; //Inasistencia[]


    public function __construct(Cargo $cargo, float $salario, ?array $diasLaborables = null)
    {
        $this->cargo = $cargo;
        $this->prestamos = array();
        $this->salario = $salario;
        $this->diasLaborables = $diasLaborables;
        $this->inasistencias = array();
    }
}
?>