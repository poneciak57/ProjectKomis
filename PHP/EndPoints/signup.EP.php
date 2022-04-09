<?php
if (isset($_POST['submit'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    require_once "../Classes/DBh.class.php";
    require_once "../Classes/signup.class.php";
    require_once "../Classes/signup.controller.php";

    if (isset($_POST["MoreInfo"])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];

        $signup = new SignupController($login, $password, $name, $surname, $telephone, $email);
        $signup->signupUserWithProperties();
    } else {
        $signup = new SignupController($login, $password);
        $signup->signupUser();
    }
    header("location: ../../index.php");
}
