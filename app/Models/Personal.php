<?php
class Personal
{
    public int $id;
    public string $nombre;
    public int $tipo; //0:Fijo, 1: Por horas
    public array $tiposRemuneracion; //PersonalRemuneracion[]

    public function __construct(int $id, string $nombre, int $tipo, array $tiposRemuneracion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->tiposRemuneracion = $tiposRemuneracion;
    }
}
?>