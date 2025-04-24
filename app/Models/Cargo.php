<?php
class Cargo
{
    public int $id;
    public string $nombre;
    public Personal $personal;
    public function __construct(int $id, string $nombre, Personal $personal)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->personal = $personal;
    }
}
?>