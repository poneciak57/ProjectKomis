<!-- requier DBh.class.php -->
<?php

class Signup extends Dbh
{
    protected function setUser($login, $password): void
    {
        $stmt = $this->connect()->prepare("INSERT INTO `users`(`Login`, `Password`) VALUES (?,?);");

        $password = sha1($password);

        if (!$stmt->execute([$login, $password])) {
            $stmt = null;
            header("location: ../index.php?error=StmtError");
            exit();
        }
        $stmt = null;
    }
    protected function IfUserExists($login): bool
    {
        $stmt = $this->connect()->prepare("SELECT ID FROM users WHERE Login = ?;");
        if (!$stmt->execute([$login])) {
            $stmt = null;
            header("location: ../index.php?error=StmtError");
            exit();
        }

        $returnValue = false;
        if ($stmt->rowCount() > 0) {
            $returnValue = true;
        }
        $stmt = null;
        return $returnValue;
    }
}
