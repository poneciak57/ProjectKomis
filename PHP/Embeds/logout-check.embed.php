<?php
require_once "/ProjectKomis/PHP/Includes/session-start.include.php";
if (time() - $_SESSION['timestamp'] > 600) {
    header("Location: ../PHP/EndPoints/logout.EP.php");
    exit;
} else {
    $_SESSION['timestamp'] = time();
}
