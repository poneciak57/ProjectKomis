<?php
if (isset($_POST['submit'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    require_once "../Classes/DBh.class.php";
    require_once "../Classes/signup.class.php";
    require_once "../Classes/signup.controller.php";

    $signup = new SignupController($login, $password);
    $signup->signupUser();

    header("location: ../../index.php");
}
