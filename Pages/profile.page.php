<?php
require_once "../Modules/logout-check.module.php";
require_once "../PHP/Classes/profile.controller.php";
require_once "../PHP/Classes/Structs/user.struct.php";
$User = unserialize($_SESSION["User"]);

$Profile = new ProfileController();
$Data = $Profile->GetProfile($User);

?>

<?php
// if profile info were updated
if (isset($_GET['Updated'])) {

    // echo var_dump($_GET);
    // if sprawdziajacy czy updatowano pomyslnie
    // if ($_GET['Updated'] == 'true')
    //     echo 'updated';
    // else
    //     echo 'blad';

    //page wont display message everytime user refresh page (Bugged)
    // if (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0')
    //     header("location: /Pages/profile.page.php");
}
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
        <h1 align="center">Mój Profil</h1>
        <div id="setting-section">
            <h2>Ustawienia domyślne</h2>
            <div id="info-section">
                <div id="profile-avatar">
                    <div id="avatar"></div>
                    <p style="margin-bottom:0px;"><?php echo $Data["Login"] ?></p>
                    <p style="color:var(--main-gray); font-size:var(--normal-font-size); margin-top:0px;">
                        <?php
                        if ($User->Privileges == 1)
                            echo 'Admin';
                        else
                            echo 'User';
                        ?></p>
                </div>

                <div id="info">
                    <form action="../PHP/EndPoints/Profile/profile.ep.php" method="post">
                        <input type="text" name="login" placeholder="Login" id="login" value="<?php echo $Data["Login"] ?>">
                        <div id="row">
                            <input type="text" name="imie" placeholder="Imię" id="imie" value="<?php echo $Data["Imie"] ?>">
                            <input type="text" name="nazwisko" placeholder="Nazwisko" id="nazwisko" value="<?php echo $Data["Nazwisko"] ?>">
                        </div>
                        <input type="text" name="email" placeholder="Adres e-mail" id="email" value="<?php echo $Data["E-mail"] ?>">
                        <input type="text" name="telefon" placeholder="Telefon" id="telefon" value="<?php echo $Data["Telefon"] ?>">
                        <input type="submit" name="zatwierdz" value="Zatwierdź" id="button">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("../Modules/footer.module.php"); ?>
</body>


</html>