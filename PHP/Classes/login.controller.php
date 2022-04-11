<!-- requier login.controller.php -->
<?php

require_once "login.class.php";
class LoginController extends Login
{
    private $login;
    private $password;

    public function __construct($login = null, $password = null)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function loginUser(): void
    {
        if ($this->password != null && $this->login != null) {
            if (!($User = $this->getUser($this->login, $this->password))) {
                header("location: /Pages/login.page.php?error=Provided input is incorrect");
                exit();
            }
            session_start();
            $_SESSION["User"] = serialize($User);
            $_SESSION['timestamp'] = time();
        }
    }

    public function IsLoginCorrect(): void
    {
        $ret = $this->login != null && $this->checkLogin($this->login);
        $response = ["IsLoginCorrect" => $ret];
        $json = json_encode($response);
        header('Content-Type: application/json');
        echo $json;
    }
}
