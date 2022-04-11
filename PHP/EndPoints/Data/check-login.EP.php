<?php
if (isset($_GET['login'])) {
    require_once "../../Classes/login.controller.php";
    $login = new LoginController($_GET['login']);
    $login->IsLoginCorrect();
}
