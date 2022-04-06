<?php
if (isset($_POST['submit'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    require_once "../Classes/DBh.class.php";
    require_once "../Classes/login.class.php";
    require_once "../Classes/login.controller.php";

    $login = new LoginController($login, $password);
    $login->loginUser();

    header("location: ../../index.php");
}
