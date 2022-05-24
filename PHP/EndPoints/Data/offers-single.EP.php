<?php

header('Content-Type: application/json');
require_once "../../Functions/logout-check.func.php";
require_once "../../Classes/offers.controller.php";

if (!isset($_POST['ID'])) {
    echo json_encode(['error' => 'Bad request']);
    exit();
}

if (logout_check() != LoginState::Loged_In) {
    echo json_encode(['error' => 'U are not loged in', 'loged_in' => false]);
    exit();
}
$OC = new OffersController();
$res = $OC->getSingle($_GET['ID']);

$res["error"] = "none";
$res["loged_in"] = true;
echo json_encode($res);
