<?php
if (isset($_POST['submit'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    require_once "../Classes/DBh.class.php";
    require_once "../Classes/signup.class.php";
    require_once "../Classes/signup.controller.php";

    $signup = new SignupController($login, $password);
    if (isset($_POST["MoreInfo"])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];

        $signup->addProperties($name, $surname, $telephone, $email);
        $signup->signupUserWithProperties();
    } else {
        $signup->signupUser();
    }
    header("location: /PHP/EndPoints/login.EP.php?login={$login}&password={$password}");
}
