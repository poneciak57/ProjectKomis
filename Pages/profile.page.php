<?php
require_once "../Modules/logout-check.module.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/footer.module.styles.css">
    <link rel="stylesheet" href="../Css/navbar.module.styles.css">
    <link rel="stylesheet" href="../Css/profile.module.styles.css">
</head>

<body>

    <?php include("../Modules/navbar.module.php"); ?>

    <div id="main-section">
        <h1 align="center">Moje konto</h1>
        <div id="setting-section">
            <h2>Ustawienia domyślne</h2>
            <div id="info-section">
                <div id="profile-avatar">
                    <div id="avatar"></div>
                    <p>Nazwa konta</p>
                </div>

                <div id="info">
                    <input type="text" name="login" placeholder="Login" id="login">
                    <div id="row">
                        <input type="text" name="imie" placeholder="Imię" id="imie">
                        <input type="text" name="nazwisko" placeholder="Nazwisko" id="nazwisko">
                    </div>
                    <input type="text" name="email" placeholder="Adres e-mail" id="email">
                    <input type="text" name="telefon" placeholder="Telefon" id="telefon">
                    <input type="button" name="zatwierdz" value="Zatwierdź" id="button">
                </div>
            </div>
        </div>
    </div>

    <?php include("../Modules/footer.module.php"); ?>

</body>

</html>