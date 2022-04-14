<?php
require_once "../../Embeds/logout-check.embed.php";
header('Content-Type: application/json');
$res = [];
if (isset($_GET['ID'])) {
    session_start();
    if (isset($_SESSION["User"])) {
        require_once "/ProjectKomis/PHP/Classes/Structs/user.struct.php";
        if (unserialize($_SESSION["User"])->Privileges == 1) {
            require_once "../../Classes/offers.controller.php";

            $OC = new OffersController($_GET);
            $OC->deleteOffer();

            $res["error"] = "none";
        } else {
            $res["error"] = "Wrong prvilileges";
        }
    } else {
        $res["error"] = "U are not loged in";
    }
} else {
    $res["error"] = "Bad request";
}
echo json_encode($res);
