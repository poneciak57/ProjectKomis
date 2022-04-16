<?php
if (isset($_GET["error"])) {
    echo "ERROR: {$_GET["error"]}";
}
?>

<head>

</head>

<body>

    <form method="GET" action="../PHP/EndPoints/Login&Signup/login.EP.php">
        login: <input type="text" name="login"></br>
        password: <input type="password" name="password"></br>
        <input type="submit" name="submit" value="submit">
    </form>

</body>