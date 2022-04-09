<!-- requier signup.class.php -->
<?php


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

    public function signupUser(): void
    {
        if ($this->IsLoginInCorrect()) {
            header("location: ../../index.php?error=IncorectInput");
            exit();
        }
        if ($this->IfUserExists($this->login)) {
            header("location: ../../index.php?error=UserExists");
            exit();
        }
        $this->setUser($this->login, $this->password);
    }
    public function signupUserWithProperties(): void
    {
        if ($this->IsLoginInCorrect()) {
            header("location: ../../index.php?error=IncorectInput");
            exit();
        }
        if ($this->IfUserExists($this->login)) {
            header("location: ../../index.php?error=UserExists");
            exit();
        }
        $this->setUserWithProperties($this->login, $this->password, $this->name, $this->surname, $this->telephone, $this->email);
    }

    private function IsLoginInCorrect(): bool
    {
        return (empty($this->login));
    }
}
