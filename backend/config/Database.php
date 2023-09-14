<?php
class Database
{
    private $host = "127.0.0.1";
    private $db_name = "YOatiML";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getInstance()
    {
        if ($this->conn == null) {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
        }
        return $this->conn;
    }
}
