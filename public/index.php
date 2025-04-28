<?php

$path = $_GET['q'] ?? '';

// echo $path;
switch ($path) {
    case 'login':
        // if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        //     $controller = new ErrorController();
        //     $controller->notFound();
        // } hay que implementar el controlador de error


        $controller = new LoginController();
        $controller->index();
        break;
}
?>