<!-- requier DBh.class.php -->
<?php

require_once "DBh.class.php";
class Signup extends Dbh
{
    protected function setUser($login, $password): void
    {
        $stmt = $this->connect()->prepare("INSERT INTO `users`(`Login`, `Password`) VALUES (?,?);");
        $password = sha1($password);
        $this->handleExec($stmt, [$login, $password]);
        $stmt = null;
    }
    protected function setUserWithProperties($login, $password, $name, $surname, $telephone, $email): void
    {
        $stmt = $this->connect()->prepare("INSERT INTO `users`(`Login`, `Password`,`Imie`, `Nazwisko`, `Telefon`, `E-mail`,`ID_Uprawnien`) VALUES (?,?,?,?,?,?,2);");
        $password = sha1($password);
        $this->handleExec($stmt, [$login, $password, $name, $surname, $telephone, $email]);
        $stmt = null;
    }
    protected function IfUserExists($login): bool
    {
        $stmt = $this->connect()->prepare("SELECT COUNT(ID) FROM users WHERE Login = ?;");
        $this->handleExec($stmt, [$login]);
        $returnValue = $stmt->fetch(PDO::FETCH_COLUMN) > 0;
        $stmt = null;
        return $returnValue;
    }
}
