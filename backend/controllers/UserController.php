<?php

require '../models/User.php';

class UserController
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getUsers()
    {
        try {
            $res = $this->user->GetAllUsers();
            header('Content-Type: application/json');
            echo json_encode($res);
        } catch (Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function createUser($request)
    {
        // $res = $this->user->createUser();
    }
}
