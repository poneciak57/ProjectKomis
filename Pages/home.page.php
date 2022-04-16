<?php
require_once "../PHP/Embeds/add-view.embed.php";
require_once "../PHP/Embeds/logout-check.embed.php";
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


    <h2>Errors and messages:</h2></br>
    <?php
    if (isset($_GET["error"]))
        echo "Error: {$_GET['error']}<br>";
    if (isset($_GET["message"]))
        echo "Message: {$_GET['message']}<br>";
    ?>
</body>