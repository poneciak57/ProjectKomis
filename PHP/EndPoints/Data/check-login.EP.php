<?php
header('Content-Type: application/json');
$res = [];
if (isset($_GET['login'])) {
    require_once "../../Classes/login.controller.php";
    $login = new LoginController($_GET['login']);

    $res["IsLoginCorrect"] = $login->IsLoginCorrect();
    $res["error"] = "none";
} else {
    $res["error"] = "Bad request";
}
echo json_encode($res);
