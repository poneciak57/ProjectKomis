<?php
@session_start();
if (isset($_SESSION['User'])) {
    if (time() - $_SESSION['timestamp'] > 600) {
        header("Location: /PHP/EndPoints/Login&Signup/logout.EP.php");
        exit();
    } else {
        $_SESSION['timestamp'] = time();
    }
}
