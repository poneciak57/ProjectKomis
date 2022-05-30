<?php

require_once "../../Functions/logout-check.func.php";
require_once "../../Classes/Structs/user.struct.php";
require_once "../../Classes/profile.controller.php";

if (logout_check() != LoginState::Loged_In) {
    header("location: /Pages/home.page.php?message=You got loged out");
    exit();
}
$User = unserialize($_SESSION["User"]);
$Profile = new ProfileController();

$Profile->UpdateProfile($User, $_POST);

$User->Login = $_POST["login"];
$_SESSION["User"] = serialize($User);
header("location: /Pages/profile.page.php?Updated=true");
