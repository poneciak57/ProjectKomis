<?php
class User
{
    public $ID;
    public $Login;
    public function __construct($ID, $Login)
    {
        $this->ID = $ID;
        $this->Login = $Login;
    }
}
