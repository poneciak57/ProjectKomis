<?php

require_once "../../Classes/Structs/user.struct.php";
require_once "../../Classes/profile.class.php";
 

@session_start();
$User = unserialize($_SESSION["User"]);
$Profile = new Profile();

$Profile->UpdateProfile($User, $_POST["imie"], $_POST["nazwisko"], $_POST["login"], $_POST["email"], $_POST["telefon"]);

$User->Login = $_POST["login"];
$_SESSION["User"] = serialize($User);

?>
