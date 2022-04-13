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
        try {
            return $this->connect()->query("SELECT COUNT(ID) FROM `samochody`;")->fetch(PDO::FETCH_COLUMN);
        } catch (PDOException) {
            header("location: /Pages/error.page.php?error=StmtError");
            exit();
        }
    }
    public function Clients(): int
    {
        try {
            return $this->connect()->query("SELECT COUNT(ID) FROM `users`;")->fetch(PDO::FETCH_COLUMN);
        } catch (PDOException) {
            header("location: /Pages/error.page.php?error=StmtError");
            exit();
        }
    }
    public function Ratings(): float
    {
        try {
            return $this->connect()->query("SELECT AVG(Ocena) FROM `oceny`;")->fetch(PDO::FETCH_COLUMN) | 0.0;
        } catch (PDOException) {
            header("location: /Pages/error.page.php?error=StmtError");
            exit();
        }
    }
}
