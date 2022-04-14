<?php

//closing session
@session_start();
session_unset();
session_destroy();

//going back to front page
header("location: /Pages/home.page.php?message=You got loged out");
