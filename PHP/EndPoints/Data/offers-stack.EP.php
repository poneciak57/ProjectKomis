<?php
if (isset($_GET['offer_page'])) {
    require_once "../../Classes/offers.controller.php";

    $request = ["offer_page" => $_GET['offer_page']];
    $OC = new OffersController($request);
    $stack = $OC->getStack();

    header('Content-Type: application/json');
    $json = json_encode($stack);
    echo $json;
}
