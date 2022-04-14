<?php
if (isset($_GET['ID'])) {
    require_once "../../Classes/offers.controller.php";

    $request = ["ID" => $_GET['ID']];
    $OC = new OffersController($request);
    $single = $OC->getSingle($_GET['ID']);

    header('Content-Type: application/json');
    $json = json_encode($single);
    echo $json;
}
