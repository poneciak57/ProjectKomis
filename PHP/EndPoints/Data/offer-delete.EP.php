<?php

require_once "../../Functions/logout-check.func.php";
require_once "../../Classes/Structs/user.struct.php";
require_once "../../Classes/offers.controller.php";

if (!isset($_GET['ID'])) {
    header("location: /Pages/error.page.php?error=Wrong request");
    exit();
}

if (logout_check() != LoginState::Loged_In) {
    header("location: /Pages/home.page.php?message=You got loged out");
    exit();
}
if (unserialize($_SESSION["User"])->Privileges != 1) {
    header("location: /Pages/offers-single.page.php?ID={$_GET['ID']}&message=Wrong privilages");
    exit();
}


$OC = new OffersController();
$OC->deleteOffer(Id: $_GET['ID']);

header("location: /Pages/offers.page.php?message=Deleted offer");
