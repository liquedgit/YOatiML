<?php
require '../config/Database.php';
class User
{
    private $conn;
    private $table_name = "users";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getInstance();
    }

    public function GetAllUsers()
    {
        try {
            $query = "SELECT *  FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException  $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function createUser($username, $plainPassword, $role)
    {
        try {
            $query = "INSERT INTO " . $this->table_name . " VALUES (:id,:username, :password, :role, :created_at, NOW())";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':username' => $username,
                ':password' => password_hash($plainPassword, PASSWORD_BCRYPT_DEFAULT_COST),
                ':role' => $role,
            ]);
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }
}
