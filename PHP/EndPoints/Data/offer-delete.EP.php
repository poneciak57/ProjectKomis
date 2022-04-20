<?php
require_once "../../Functions/logout-check.func.php";
header('Content-Type: application/json');
$res = [];
if (isset($_GET['ID'])) {
    if (logout_check() == LoginState::Loged_In) {
        require_once "/ProjectKomis/PHP/Classes/Structs/user.struct.php";
        if (unserialize($_SESSION["User"])->Privileges == 1) {
            require_once "../../Classes/offers.controller.php";

            $OC = new OffersController($_GET);
            $OC->deleteOffer();

            $res["error"] = "none";
            $res["loged_in"] = true;
        } else {
            $res["error"] = "Wrong prvilileges";
            $res["loged_in"] = true;
        }
    } else {
        $res["error"] = "U are not loged in";
        $res["loged_in"] = false;
    }
} else {
    $res["error"] = "Bad request";
}
echo json_encode($res);
