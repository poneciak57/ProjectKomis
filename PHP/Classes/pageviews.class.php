<?php
require_once "DBh.class.php";
class PageViews extends DBh
{
    public function getViews(): int
    {
        try {
            return $this->connect()->query("SELECT COUNT(ID) FROM odwiedziny;")->fetch(PDO::FETCH_COLUMN);
        } catch (PDOException) {
            $this->error();
        }
    }
    public function addView()
    {
        $stmt = $this->connect()->prepare("INSERT INTO odwiedziny(IP_adress) VALUES(?);");
        try {
            $stmt->execute([$this->getIP()]);
        } catch (PDOException) {
        }
        $stmt = null;
    }

    private function getIP(): string
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
