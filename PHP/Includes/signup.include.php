<?php
if (isset($_POST['submit'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    require_once "../Classes/dbh.classes.php";
    require_once "../Classes/signup.classes.php";
    require_once "../Classes/signup-contr.classes.php";

    $signup = new SignupController($login, $password);
    $signup->signupUser();

    header("location: ../index.php?error=none");
}
