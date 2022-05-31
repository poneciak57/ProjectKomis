<?php
require_once "../Modules/logout-check.module.php";
if (!isset($_GET['ID'])) {
    header("location: /Pages/error.page.php?error=WrongOfferID");
    exit();
}

require_once "../PHP/Classes/Structs/user.struct.php";
require_once "../PHP/Classes/offers.controller.php";


if (!unserialize($_SESSION["User"])->Privileges == 1) {
    header("location: /Pages/offers-single.page.php?ID={$_GET['ID']}&message=Wrong privilages");
}

$OC = new OffersController($_GET);
$offer = $OC->getSingle();

require_once  "../PHP/Classes/form-options.controller.php";
$OptC = new OptionsController();


?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <title>Autostop - Stwórz ofertę</title>
    <link href="../Css/navbar.module.styles.css" rel="stylesheet">
    <link href="../Css/footer.module.styles.css" rel="stylesheet">
    <link href="../Css/offers-single.page.styles.css" rel="stylesheet">
    <link href="../Css/admin-offers-single.page.styles.css" rel="stylesheet">
</head>

<body>
    <?php include "../Modules/navbar.module.php"; ?>

    <script src="../JS/offers-single.js"></script>
    <form action="../PHP/EndPoints/Data/offer-update.EP.php?<?php echo $_GET['ID'] ?>" method="post">
        <div id="offer-main-div">

            <div id="offer-image-div" onclick="document.getElementById('zdjecie').click();">
                <input type="file" id="zdjecie" name="zdjecie">
            </div>
            <div id="offer-maininfo">
                <div id="offer-maininfo-title">
                    Marka&nbsp;<select name="marka" id="offers-filters-marka"><?php $OptC->Brands(); ?></select>&nbsp;&nbsp;&nbsp;Model&nbsp;<input type="text" name="model">
                </div>
                <div id="offer-maininfo-price">
                    <div id="offer-maininfo-price-text">
                        <div><input type="number" name="cena" value="<?php echo $offer['cena'] ?>"> zł</div>
                        <div id="offer-maininfo-price-text-monthly">od
                            zł miesięcznie <br><span style="font-size: var(--small-font-size); float: right;">okres leasingu: 5 lat</span></div>
                    </div>
                    <div id="offer-maininfo-price-buttondiv">
                        <button value="Kup teraz" id="offer-maininfo-price-button">Zapisz</button>
                        <a href="contact.page.php" id="offer-maininfo-price-contact">Skontaktuj się z nami</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="offer-description-main">
            <div id="offer-description-title">
                <span>Szczegóły samochodu</span>
                <hr>
            </div>
            <div id="offer-description">
                <table class="offer-description-table" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="4">Podstawowe informacje</th>
                    </tr>
                    <tr>
                        <td>Rok produkcji</td>
                        <td><select name="rok_produkcji_id"><?php $OptC->Year(); ?></select></td>
                        <td>Przebieg</td>
                        <td><input type="number" name="przebieg" value="<?php echo $offer['przebieg'] ?>"> km</td>
                    </tr>
                    <tr>
                        <td>Rodzaj paliwa</td>
                        <td><select name="paliwo_id"><?php $OptC->Fuels(); ?></select></td>
                        <td>Skrzynia biegów</td>
                        <td><select name="skrzynia_id"><?php $OptC->Gearboxes(); ?></select></td>
                    </tr>
                    <tr>
                        <td colspan="1">Moc</td>
                        <td><input type="number" name="moc_silnika" value="<?php echo $offer['moc_silnika'] ?>"> KM</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>

                <table class="offer-description-table" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="4">Wnętrze i nadwozie</th>
                    </tr>
                    <tr>
                        <td>Drzwi</td>
                        <td><input type="number" name="Liczba_drzwi" value="<?php echo $offer['Liczba_drzwi'] ?>"></td>
                        <td>Liczba miejsc</td>
                        <td><input type="number" name="Liczba_miejsc" value="<?php echo $offer['Liczba_miejsc'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Kolor</td>
                        <td><select name="kolor_id"><?php $OptC->Colors(); ?></select></td>
                        <td>Tapicerka</td>
                        <td><input type="text" name="Tapicerka" value="<?php echo $offer['Tapicerka'] ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="1">Typy opon</td>
                        <td><input type="text" name="Typ_opon" value="<?php echo $offer['Typ_opon'] ?>"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>

                <table class="offer-description-table" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="4">Silnik i spalanie</th>
                    </tr>
                    <tr>
                        <td>Oryginalny silnik </td>
                        <td><select name="Oryginalny_silnik">
                                <option value="1">tak</option>
                                <option value="0">nie</option>
                            </select></td>
                        <td>Emisja CO2</td>
                        <td><input type="number" name="Emisja_CO2" value="<?php echo $offer['Emisja_CO2'] ?>">g/km</td>
                    </tr>
                </table>

                <table class="offer-description-table" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="4">Historia samochodu</th>
                    </tr>
                    <tr>
                        <td>Kraj pochodzenia</td>
                        <td><select name="kraj_pochodzenia_id"><?php $OptC->Countries(); ?></select></td>
                        <td>Ostatni serwis</td>
                        <td><input type="text" name="Ostatni_serwis" value="<?php echo $offer['Ostatni_serwis'] ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="1">Liczba kluczy</td>
                        <td><input type="number" name="Liczba_kluczy" value="<?php echo $offer['Liczba_kluczy'] ?>"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>

                <table class="offer-description-table" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="4">Dane samochodu</th>
                    </tr>
                    <tr>
                        <td colspan="1">Numer wewnętrzny</td>
                        <td><input type="number" name="Numer_wewnetrzny" value="<?php echo $offer['Numer_wewnetrzny'] ?>"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>


            </div>
        </div>
    </form>
    <?php include "../Modules/footer.module.php"; ?>
</body>

</html>