<?php

require_once "DBh.class.php";
require_once "Structs/user.struct.php";
class Login extends DBh
{
    protected function getUser($login, $password): User|false
    {
        $stmt = $this->connect()->prepare("SELECT ID ,ID_Uprawnien FROM users WHERE Login = ? AND Password = ?;");
        $password = sha1($password);
        $this->handleExec($stmt, [$login, $password]);

        $fetched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        if (empty($fetched)) {
            return false;
        }
        $fetched = $fetched[0];
        $User = new User($fetched["ID"], $login, $password, $fetched["ID_Uprawnien"]);
        return $User;
    }
    protected function checkLogin($login): bool
    {
        $stmt = $this->connect()->prepare("SELECT ID FROM users WHERE Login = ?;");
        $this->handleExec($stmt, [$login]);
        $row_nr = $stmt->rowCount();
        $stmt = null;
        return $row_nr > 0;
    }
}
