<?php

require '../controllers/UserController.php';

$request_method = $_SERVER["REQUEST_METHOD"];
$userController = new UserController();

switch ($request_method) {
    case 'GET':
        $userController->getUsers();
        break;
    case 'POST':
        $userController->createUser($_REQUEST);
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
        break;
}
