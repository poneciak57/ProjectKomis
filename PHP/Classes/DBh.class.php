<?php

abstract class DBh
{
    private $host = 'localhost';
    private $db   = 'komis';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    protected function connect(): PDO|false
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try {
            $conn = new PDO($dsn, $this->user, $this->pass, $this->options);
        } catch (PDOException) {
            header("location: /Pages/error.page.php?error=ConnectionError");
            exit();
        }
        return $conn;
    }

    protected function error()
    {
        header("location: /Pages/error.page.php?error=StmtError");
        exit();
    }
    protected function handleExec(PDOStatement &$stmt, array $args = [])
    {
        try {
            $stmt->execute($args);
        } catch (PDOException $e) {
            $this->debug($e);
            $stmt = null;
            $this->error();
        }
    }

    private function debug(PDOException $e)
    {
        echo '<br>message: ' . $e->getMessage() . '<br>';
        echo 'code: ' . $e->getCode();
        exit();
    }
}
