<?php
class Personal
{
    public int $id;
    public string $nombre;
    public int $tipo; //0:Fijo, 1: Por horas

    public function __construct(int $id, string $nombre, int $tipo)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }
}
?>