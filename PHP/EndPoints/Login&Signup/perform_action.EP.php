<?php

header('Content-Type: application/json');
require_once "../../Functions/logout-check.func.php";

if (logout_check() != LoginState::Loged_In) {
    echo json_encode(['error' => 'U are not loged in', 'loged_in' => false]);
    exit();
}
echo json_encode(['error' => 'none', 'loged_in' => true]);
