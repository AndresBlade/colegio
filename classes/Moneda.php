<?php
class Moneda
{
    public int $id;
    public string $nombre;
    public string $simbolo;

    public function __construct(int $id, string $nombre, string $simbolo)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->simbolo = $simbolo;
    }
}
?>