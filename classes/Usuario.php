<?php
require_once 'Rol.php';
class Usuario
{
    public int $id;
    public string $correo;
    public Rol $role;

    public function __construct(int $id, string $correo, Rol $role)
    {
        $this->id = $id;
        $this->correo = $correo;
        $this->role = $role;
    }
}
?>