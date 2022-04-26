<?php
require_once "../../Functions/logout-check.func.php";
header('Content-Type: application/json');
$res = ["error" => "none", "loged_in" => true];
$request = [];
if (logout_check() == LoginState::Loged_In) {
    if (isset($_GET['offer_page'])) {
        require_once "../../Classes/offers.controller.php";

        $request["offer_page"] = $_GET['offer_page'];
        $request["specs"] = json_decode(file_get_contents('php://input'), true);
        $OC = new OffersController($request);
        $stack = $OC->getStack();
        $res["QuerriesFound"] = $stack["QuerriesFound"];
        $res["Offers"] = $stack["Offers"];
        unset($stack);
    } else {
        $res["error"] = "Bad request";
    }
} else {
    $res["error"] = "U are not loged in";
    $res["loged_in"] = false;
}
echo json_encode($res);
