<?php
class Pago
{ //El nombre es discutible
    public int $id;
    public DateTime $fecha;
    public float $tasa;

    public array $pagoDetalles; //PagoDetalle[]

    public function __construct(int $id, DateTime $fecha, float $tasa, array $pagoDetalles)
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->tasa = $tasa;
        $this->pagoDetalles = $pagoDetalles;
    }
}
?>