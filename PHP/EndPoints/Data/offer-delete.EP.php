<?php

header('Content-Type: application/json');
require_once "../../Functions/logout-check.func.php";
require_once "/ProjectKomis/PHP/Classes/Structs/user.struct.php";
require_once "../../Classes/offers.controller.php";

if (!isset($_POST['ID'])) {
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


$OC = new OffersController();
$OC->deleteOffer(Id: $_POST['ID']);

echo json_encode(['error' => 'none', 'loged_in' => true]);
