<?php

require_once "DBh.class.php";
require_once "pageviews.class.php";
class Statistics extends DBh
{
    public function Views(): int
    {
        $VC = new PageViews();
        return $VC->getViews();
    }
    public function Offers(): int
    {
        $stmt = $this->connect()->prepare("SELECT COUNT(ID) FROM `samochody`;");
        try {
            $stmt->execute();
        } catch (PDOException) {
            $stmt = null;
            header("location: index.php?error=StmtError");
            exit();
        }
        $count = $stmt->fetchAll(PDO::FETCH_COLUMN)[0];
        $stmt = null;
        return $count;
    }
    public function Clients(): int
    {
        $stmt = $this->connect()->prepare("SELECT COUNT(ID) FROM `users`;");
        try {
            $stmt->execute();
        } catch (PDOException) {
            $stmt = null;
            header("location: index.php?error=StmtError");
            exit();
        }
        $count = $stmt->fetchAll(PDO::FETCH_COLUMN)[0];
        $stmt = null;
        return $count;
    }
    public function Ratings(): float
    {
        $stmt = $this->connect()->prepare("SELECT AVG(Ocena) FROM `oceny`;");
        try {
            $stmt->execute();
        } catch (PDOException) {
            $stmt = null;
            header("location: index.php?error=StmtError");
            exit();
        }
        $avg = $stmt->fetchAll(PDO::FETCH_COLUMN)[0];
        $stmt = null;
        return $avg;
    }
}
