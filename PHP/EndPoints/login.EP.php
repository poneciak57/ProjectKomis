<?php
if (isset($_GET['submit'])) {

    $login = $_GET['login'];
    $password = $_GET['password'];

    require_once "../Structs/user.struct.php";
    require_once "../Classes/DBh.class.php";
    require_once "../Classes/login.class.php";
    require_once "../Classes/login.controller.php";

    $login = new LoginController($login, $password);
    $login->loginUser();

    header("location: /index.php");
}
