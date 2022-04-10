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
            header("location: /Pages/login.page.php?error=Provided input is incorrect");
            exit();
        }
        session_start();
        $_SESSION["User"] = serialize($User);
        $_SESSION['timestamp'] = time();
    }
}
