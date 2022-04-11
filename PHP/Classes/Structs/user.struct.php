<?php
class User
{
    public $ID;
    public $Login;
    public $Password;

    public function __construct($ID, $Login, $Password)
    {
        $this->ID = $ID;
        $this->Login = $Login;
        $this->Password = $Password;
    }
}
