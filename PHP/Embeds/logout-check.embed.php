<?php
session_start();
if (time() - $_SESSION['timestamp'] > 600) {
    header("Location: /PHP/EndPoints/logout.EP.php");
    exit;
} else {
    $_SESSION['timestamp'] = time();
}
