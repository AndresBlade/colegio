<?php
class Rol
{
    public int $id;
    public string $nombre;
    public string $descripcion;

    public function __construct(int $id, string $nombre, string $descripcion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
}
?>