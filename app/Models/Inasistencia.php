<?php
class Inasistencia
{
    public DateTime $fecha;
    public ?int $horas; //Si es null, es porque el cargo es fijo
    public bool $justificada;
    public string $observacion;
    public string $razon; //Peticion de Justificacion

    public function __construct(
        DateTime $fecha,
        ?int $horas,
        bool $justificada,
        string $observacion,
        string $razon
    ) {
        $this->fecha = $fecha;
        $this->horas = $horas;
        $this->justificada = $justificada;
        $this->observacion = $observacion;
        $this->razon = $razon;
    }
}
?>