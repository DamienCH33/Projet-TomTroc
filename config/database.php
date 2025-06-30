<?php
class Database
{
    private $pdo;
    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die("Erreur de connection :" . $error->getMessage());
        }
    }
    public function getPDO()
    {
        return $this->pdo;
    }
}
