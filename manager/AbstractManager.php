<?php

abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getPDO();
    }
}