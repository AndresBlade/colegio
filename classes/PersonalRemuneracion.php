<?php
class PersonalRemuneracion
{
    public TipoRemuneracion $tipoRemuneracion;
    public float $monto;

    public function __construct(TipoRemuneracion $tipoRemuneracion, float $monto)
    {
        $this->tipoRemuneracion = $tipoRemuneracion;
        $this->monto = $monto;
    }
}
?>