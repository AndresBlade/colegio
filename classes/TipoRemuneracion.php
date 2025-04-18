<?php
require_once 'Moneda.php';
class TipoRemuneracion
{
    public int $id;
    public string $nombre;
    public Moneda $moneda;

    public function __construct(int $id, string $nombre, Moneda $moneda)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->moneda = $moneda;
    }
}
?>