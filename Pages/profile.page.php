<?php
require_once "../Modules/logout-check.module.php";
require_once "../PHP/Classes/profile.class.php";
require_once "../PHP/Classes/Structs/user.struct.php";
$User = unserialize($_SESSION["User"]);

$Profile = new Profile();
$Data = $Profile->GetProfile($User)[0];

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
                    <form action="../PHP/EndPoints/Profile/profile.ep.php" method="post">
                        <input type="text" name="login" placeholder="Login" id="login" value="<?php echo $Data["Login"]?>">
                        <div id="row">
                            <input type="text" name="imie" placeholder="Imię" id="imie" value="<?php echo $Data["Imie"]?>">
                            <input type="text" name="nazwisko" placeholder="Nazwisko" id="nazwisko" value="<?php echo $Data["Nazwisko"]?>">
                        </div>
                        <input type="text" name="email" placeholder="Adres e-mail" id="email" value="<?php echo $Data["E-mail"]?>">
                        <input type="text" name="telefon" placeholder="Telefon" id="telefon" value="<?php echo $Data["Telefon"]?>">
                        <input type="submit" name="zatwierdz" value="Zatwierdź" id="button">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("../Modules/footer.module.php"); ?>

</body>

</html>