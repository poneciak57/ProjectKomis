<?php

require_once __DIR__ . "/../States/login.states.php";

function logout_check(): LoginState
{
    @session_start();
    if (isset($_SESSION['User'])) {
        if (time() - $_SESSION['timestamp'] > 600) {
            require_once __DIR__ . "/../Embeds/logout.embed.php";
            return LoginState::Got_Log_Out;
        } else {
            $_SESSION['timestamp'] = time();
            return LoginState::Loged_In;
        }
    }
    return LoginState::Loged_Out;
}
