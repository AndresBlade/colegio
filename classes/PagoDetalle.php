<?php
class PagoDetalle
{
    public Empleado $empleado;
    public TipoRemuneracion $tipoRemuneracion;
    public Columna $columna;
    public string $valor;

    public function __construct(Empleado $empleado, TipoRemuneracion $tipoRemuneracion, Columna $columna, string $valor)
    {
        $this->empleado = $empleado;
        $this->tipoRemuneracion = $tipoRemuneracion;
        $this->columna = $columna;
        $this->valor = $valor;
    }
}
?>