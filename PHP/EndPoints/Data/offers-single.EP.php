<?php
require_once "../../Embeds/logout-check.embed.php";
header('Content-Type: application/json');
$res = [];
if (isset($_GET['ID'])) {
    @session_start();
    if (isset($_SESSION["User"])) {
        require_once "../../Classes/offers.controller.php";

        $request = ["ID" => $_GET['ID']];
        $OC = new OffersController($request);
        $res = $OC->getSingle($_GET['ID']);

        $res["error"] = "none";
    } else {
        $res["error"] = "U are not loged in";
    }
} else {
    $res["error"] = "Bad request";
}
echo json_encode($res);
