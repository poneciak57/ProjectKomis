<?php
require_once "../Modules/logout-check.module.php";
?>

<head>

</head>

<body>
    <h1>Home Page</h1></br>
    <?php
    @session_start();
    if (isset($_SESSION["User"])) {
        require_once "../PHP/Classes/Structs/user.struct.php";
        $User = unserialize($_SESSION["User"]);
        echo "Hello: {$User->Login}</br>";
        echo '<a href="offers.page.php">Check our offers.</a></br>';
        echo '<form method="GET" action="../PHP/EndPoints/Login&Signup/logout.EP.php"> <input type="submit" value="log out"></form>';
    } else {
        echo '<a href="login.page.php">Zaloguj sie</a>';
    }
    ?>

    <?php //include_once "../Modules/form-options.module.php" //do testow formularza jako embed/module
    ?>

    <h2>Errors and messages:</h2></br>
    <?php
    if (isset($_GET["message"])) {
        echo "Message: {$_GET['message']}<br>";

        if (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0')
            header("location: /Pages/home.page.php");
    }
    ?>
</body>