<!-- requier signup.class.php -->
<?php

require_once "signup.class.php";
class SignupController extends Signup
{
    private $login;
    private $password;
    private $name;
    private $surname;
    private $telephone;
    private $email;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }
    public function addProperties($name, $surname, $telephone, $email)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->telephone = $telephone;
        $this->email = $email;
    }


    public function signupUser(): void
    {
        $this->IsLoginInCorrect();
        $this->setUser($this->login, $this->password);
    }
    public function signupUserWithProperties(): void
    {
        $this->IsLoginInCorrect();
        $this->setUserWithProperties($this->login, $this->password, $this->name, $this->surname, $this->telephone, $this->email);
    }

    private function IsLoginInCorrect()
    {
        if (empty($this->login)) {
            header("location: /Pages/signup.page.php?error=Incorrect Input");
            exit();
        }
        if ($this->IfUserExists($this->login)) {
            header("location: /Pages/signup.page.php?error=User with provided login already exists");
            exit();
        }
    }
}
