<?php
require_once "../../Functions/logout-check.func.php";
header('Content-Type: application/json');
$res = [];
if (isset($_GET['ID'])) {
    if (logout_check() == LoginState::Loged_In) {
        require_once "../../Classes/offers.controller.php";

        $request = ["ID" => $_GET['ID']];
        $OC = new OffersController($request);
        $res = $OC->getSingle($_GET['ID']);

        $res["error"] = "none";
        $res["loged_in"] = true;
    } else {
        $res["error"] = "U are not loged in";
        $res["loged_in"] = false;
    }
} else {
    $res["error"] = "Bad request";
}
echo json_encode($res);
