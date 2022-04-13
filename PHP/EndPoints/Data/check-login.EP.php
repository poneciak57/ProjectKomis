<?php
if (isset($_GET['login'])) {
    require_once "../../Classes/login.controller.php";
    $login = new LoginController($_GET['login']);

    $response = ["IsLoginCorrect" => $login->IsLoginCorrect()];
    $json = json_encode($response);
    header('Content-Type: application/json');
    echo $json;
}
