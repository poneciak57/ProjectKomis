<?php
require_once "../../Embeds/logout-check.embed.php";
header('Content-Type: application/json');
$res = [];
if (isset($_GET['offer_page'])) {
    session_start();
    if (isset($_SESSION["User"])) {
        require_once "../../Classes/offers.controller.php";

        $request = ["offer_page" => $_GET['offer_page']];
        $OC = new OffersController($request);
        $res = $OC->getStack();
        $res["error"] = "none";
    } else {
        $res["error"] = "U are not loged in";
    }
} else {
    $res["error"] = "Bad request";
}
echo json_encode($res);
