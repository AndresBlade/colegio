<?php
class LoginController
{
    public function index()
    {
        // Include the database connection file
        require_once 'app/Core/DB.php';
        require_once 'app/classes/Usuario.php';
        require_once 'app/classes/Rol.php';
        require_once 'app/Models/UserModel.php';

        $conn = (new DB())->get();
        $userModel = new UserModel($conn);
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        // Call the login method of the UserModel class
        $user = $userModel->login($correo, $password);
        // Check if the user is found
        if (!$user) {
            echo 'Usuario no encontrado'; //Hay que implementar el controlador de error
            // Start a session and store user data in session variables
            // Redirect to the dashboard or home page
            return;
        }
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->correo;
        $_SESSION['user_role'] = $user->role->nombre;
        // Include the login view file
        require_once 'app/Views/login.php';
    }
}
?>