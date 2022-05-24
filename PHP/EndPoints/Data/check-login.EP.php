<?php
header('Content-Type: application/json');
require_once "../../Classes/login.controller.php";

if (!isset($_GET['login'])) {
    echo json_encode(['error' => 'Bad request']);
    exit();
}
$login = new LoginController($_GET['login']);

echo json_encode(['error' => 'none', 'IsLoginCorrect' => $login->IsLoginCorrect()]);
