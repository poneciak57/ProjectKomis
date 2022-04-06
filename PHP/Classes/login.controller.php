<!-- requier login.controller.php -->
<?php
class LoginController extends Login
{
    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function loginUser(): void
    {
        if (!($User = $this->getUser($this->login, $this->password))) {
            header("location: ../../index.php?error=WrongInput");
            exit();
        }
        echo var_dump($User);
        session_start();
        $_SESSION["User"] = serialize($User);
    }
}
