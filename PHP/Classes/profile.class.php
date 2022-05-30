<?php
require_once "DBh.class.php";

class Profile extends DBh
{
    protected function Get($User)
    {
        $stmt = $this->connect()->prepare("SELECT `Imie`, `Nazwisko`, `Login`, `E-mail`, `Telefon` FROM `users` WHERE ID = ?");
        $this->handleExec($stmt, [$User->ID]);
        $fetched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $fetched;
    }
    protected function Update($User, $Imie, $Nazwisko, $Login, $Email, $Telefon)
    {
        $stmt = $this->connect()->prepare("UPDATE `users` SET  `Imie` = ?, `Nazwisko` = ?, `Login` = ?, `E-mail` = ?, `Telefon` = ?  WHERE `Login` = ?;");
        $this->handleExec($stmt, [$Imie, $Nazwisko, $Login, $Email, $Telefon, $User->Login]);
        $stmt = null;
    }
}
