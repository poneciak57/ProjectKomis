<!-- requier DBh.class.php -->
<!-- requier user.struct.php -->
<?php
require_once "../Structs/user.struct.php";
class Login extends DBh
{
    protected function getUser($login, $password): User|false
    {
        $stmt = $this->connect()->prepare("SELECT ID,Login FROM users WHERE Login = ? AND Password = ?;");
        $password = sha1($password);
        if (!$stmt->execute([$login, $password])) {
            $stmt = null;
            header("location: ../../index.php?error=StmtError");
            exit();
        }
        $fetched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        if (empty($fetched)) {
            return false;
        }
        $fetched = $fetched[0];
        $User = new User($fetched["ID"], $fetched["Login"]);
        return $User;
    }
}
