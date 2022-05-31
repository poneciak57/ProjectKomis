<?php
require_once __DIR__ . "/../PHP/Functions/logout-check.func.php";
if (logout_check() != LoginState::Loged_In) {
    header("location: /Pages/home.page.php?message=You got loged out");
    exit();
}
