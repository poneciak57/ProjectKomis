<?php

class DBh
{

    private $host = 'localhost';
    private $db   = 'komis';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    protected function connect(): PDO|false
    {
        try {
            $conn = new PDO($this->dsn, $this->user, $this->pass, $this->options);
        } catch (\PDOException $e) {
            return false;
        }
        return $conn;
    }
}
