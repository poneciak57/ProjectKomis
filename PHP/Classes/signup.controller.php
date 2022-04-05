<!-- requier signup.class.php -->
<?php


class SignupController extends Signup
{
    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function signupUser(): void
    {
        if ($this->IsLoginCorrect()) {
            header("location: ../index.php?error=IncorectInput");
            exit();
        }
        if ($this->IfUserExists($this->login)) {
            header("location: ../index.php?error=UserExists");
            exit();
        }
        $this->setUser($this->login, $this->password);
    }

    private function IsLoginCorrect(): bool
    {
        return (empty($this->login));
    }
}
