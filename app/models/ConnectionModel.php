<?php
namespace app\models;

class ConnectionModel
{
    private $host = "localhost";
    private $db = "projetos";
    private $user = "root";
    private $password = "";

    public function connect()
    {
        try {
            $conn = new \PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
            return $conn;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }
}

