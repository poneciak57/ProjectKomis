<?php
require_once "DBh.class.php";
class PageViews extends DBh
{
    public function getViews(): int
    {
        $stmt = $this->connect()->prepare("SELECT COUNT(ID) FROM odwiedziny;");
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: index.php?error=StmtError");
            exit();
        }
        $count = $stmt->fetchAll(PDO::FETCH_ASSOC)[0][0];
        $stmt = null;
        return $count;
    }
    public function addView()
    {
        $stmt = $this->connect()->prepare("INSERT INTO odwiedziny(IP_adress) VALUES(?);");
        $stmt->execute([$this->getIP()]);
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
