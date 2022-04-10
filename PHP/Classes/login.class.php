<?php

require_once "DBh.class.php";
require_once "Structs/user.struct.php";
class Login extends DBh
{
    protected function getUser($login, $password): User|false
    {
        $stmt = $this->connect()->prepare("SELECT ID FROM users WHERE Login = ? AND Password = ?;");
        $password = sha1($password);
        if (!$stmt->execute([$login, $password])) {
            $stmt = null;
            header("location: /Pages/login.page.php?error=StmtError");
            exit();
        }
        $fetched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        if (empty($fetched)) {
            return false;
        }
        $fetched = $fetched[0];
        $User = new User($fetched["ID"], $login, $password);
        return $User;
    }
}
