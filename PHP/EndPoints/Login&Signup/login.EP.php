<?php
if (isset($_GET['login'])) {

    $login = $_GET['login'];
    $password = $_GET['password'];

    require_once "../../Classes/login.controller.php";

    $login = new LoginController($login, $password);
    $login->loginUser();

    header("location: /Pages/home.page.php");
}
