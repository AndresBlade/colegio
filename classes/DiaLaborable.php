<?php
require_once 'DiaSemana.php';
class DiaLaborable
{
    public DiaSemana $diaSemana;
    public int $horas;

    public function __construct(DiaSemana $diaSemana, int $horas)
    {
        $this->diaSemana = $diaSemana;
        $this->horas = $horas;
    }
}
?>