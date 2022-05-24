<?php

header('Content-Type: application/json');
require_once "../../Functions/logout-check.func.php";
require_once "/ProjectKomis/PHP/Classes/Structs/user.struct.php";
require_once "../../Classes/offers.controller.php";

if (!isset($_POST['submit'])) {
    echo json_encode(['error' => 'Bad request']);
    exit();
}
if (logout_check() != LoginState::Loged_In) {
    echo json_encode(['error' => 'U are not loged in', 'loged_in' => false]);
    exit();
}
if (unserialize($_SESSION["User"])->Privileges != 1) {
    echo json_encode(['error' => 'Wrong prvilileges', 'loged_in' => true]);
    exit();
}

$OC = new OffersController($_POST);
if (isset($_FILES['zdjecie'])) {
    $OC->updateOffer($_POST['ID'], imgData: file_get_contents($_FILES['UserPhoto']['tmp_name']));
} else {
    $OC->updateOffer($_POST['ID'], imgData: null);
}
echo json_encode(['error' => 'none', 'loged_in' => true]);
