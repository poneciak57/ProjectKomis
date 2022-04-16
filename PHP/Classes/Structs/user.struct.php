<?php
class User
{
    public $ID;
    public $Login;
    public $Password;
    public $Privileges;

    public function __construct($ID, $Login, $Password, $Privileges)
    {
        $this->ID = $ID;
        $this->Login = $Login;
        $this->Password = $Password;
        $this->Privileges = $Privileges;
    }
}
