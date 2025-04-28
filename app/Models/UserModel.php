<?php
class UserModel
{
    private $conn;
    private $table = 'usuarios';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        $roleModel = new RoleModel($this->conn);
        $role = $roleModel->getById($user['rol_id']);
        return new Usuario($user['id'], $user['correo'], new Rol($role['id'], $role['nombre'], $role['descripcion']));
    }

    public function login($correo, $password)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE correo = :correo AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        $roleModel = new RoleModel($this->conn);
        $role = $roleModel->getById($user['rol_id']);
        return new Usuario($user['id'], $user['correo'], new Rol($role['id'], $role['nombre'], $role['descripcion']));
    }
}
?>