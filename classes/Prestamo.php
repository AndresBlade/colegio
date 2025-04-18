<?php
class Prestamo
{
    public int $id;
    public int $monto;
    public bool $aceptado;
    public ?DateTime $fechaAceptacion; //Si no ha sido aceptado, es null

    public function __construct(int $monto, bool $aceptado, ?DateTime $fechaAceptacion = null)
    {
        $this->monto = $monto;
        $this->aceptado = $aceptado;
        $this->fechaAceptacion = $fechaAceptacion;
    }
}
?>