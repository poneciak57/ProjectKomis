<?php

header('Content-Type: application/json');
require_once "../../Functions/logout-check.func.php";
require_once "../../Classes/offers.controller.php";

if (logout_check() != LoginState::Loged_In) {
    echo json_encode(['error' => 'U are not loged in', 'loged_in' => false]);
    exit();
}
$request = [];
if (!(isset($_GET['offer_page']) && ($request["specs"] = json_decode(file_get_contents('php://input'), true)) != null)) {
    echo json_encode(['error' => 'Bad request']);
    exit();
}

$request["offer_page"] = $_GET['offer_page'];
$OC = new OffersController($request);
$stack = $OC->getStack();

$res = ["error" => "none", "loged_in" => true];
$res["QuerriesFound"] = $stack["QuerriesFound"];
$res["Offers"] = $stack["Offers"];

echo json_encode($res);
