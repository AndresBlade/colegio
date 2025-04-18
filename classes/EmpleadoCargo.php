<?php
class EmpleadoCargo
{
    public Cargo $cargo;
    public float $salario;
    public ?array $diasLaborables; //DiaLaborable[] si es personal por horas


    public function __construct(Cargo $cargo, float $salario)
    {
        $this->cargo = $cargo;
        $this->salario = $salario;
    }
}
?>