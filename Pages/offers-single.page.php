<?php
require_once "../Modules/logout-check.module.php";
if (!isset($_GET['ID'])) {
    header("location: /Pages/error.page.php?error=WrongOfferID");
    exit();
}

require_once "../PHP/Classes/Structs/user.struct.php";
require_once "../PHP/Classes/offers.controller.php";


$is_admin = (unserialize($_SESSION["User"])->Privileges == 1);

$OC = new OffersController($_GET);
$offer = $OC->getSingle();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <title>Nazwa Firmy - Nazwa Oferty</title>
    <link href="../Css/navbar.module.styles.css" rel="stylesheet">
    <link href="../Css/footer.module.styles.css" rel="stylesheet">
    <link href="../Css/offers-single.page.styles.css" rel="stylesheet">
    <script src="../JS/single.favs.js"></script>
    <style>
        #fav-heart-container {
            width: 5vh;
            height: 5vh;
        }
    </style>
</head>

<body>
    <?php include "../Modules/navbar.module.php"; ?>

    <div id="offer-main-div">
        <div id="offer-test" style="background-image: url('data:image/jpeg;base64,<?php echo $offer["zdjecie"] ?>');"></div>
        <div id="offer-image-div">
            <img src="data:image/jpeg;base64,<?php echo $offer["zdjecie"] ?>" id="offer-image">
        </div>
        <div id="offer-maininfo">
            <div id="offer-maininfo-title">
                <?php echo $offer["marka"] . " " . $offer["model"] ?>
                <img id="fav-heart-container">
            </div>
            <div id="offer-maininfo-price">
                <div id="offer-maininfo-price-text">
                    <div><?php echo $offer["cena"] ?> zł</div>
                    <div id="offer-maininfo-price-text-monthly">od <?php echo round($offer["cena"] / 60, 2) ?> zł miesięcznie <br><span style="font-size: var(--small-font-size); float: right;">okres leasingu: 5 lat</span></div>
                </div>
                <div id="offer-maininfo-price-buttondiv">
                    <button value="Kup teraz" id="offer-maininfo-price-button">Kup teraz</button>
                    <a href="" id="offer-maininfo-price-contact">Skontaktuj się z nami</a>
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
                    <td><?php echo $offer["rok_produkcji"] ?></td>
                    <td>Przebieg</td>
                    <td><?php echo $offer["przebieg"] ?> km</td>
                </tr>
                <tr>
                    <td>Rodzaj paliwa</td>
                    <td><?php echo $offer["typ_paliwa"] ?></td>
                    <td>Skrzynia biegów</td>
                    <td><?php echo $offer["skrzynia"] ?></td>
                </tr>
                <tr>
                    <td colspan="1">Moc</td>
                    <td><?php echo $offer["moc_silnika"] ?> KM</td>
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
                    <td><?php echo $offer["liczba_drzwi"] ?></td>
                    <td>Liczba miejsc</td>
                    <td><?php echo $offer["liczba_miejsc"] ?></td>
                </tr>
                <tr>
                    <td>Kolor</td>
                    <td><?php echo $offer["kolor"] ?></td>
                    <td>Tapicerka</td>
                    <td><?php echo $offer["tapicerka"] ?></td>
                </tr>
                <tr>
                    <td colspan="1">Typy opon</td>
                    <td><?php echo $offer["typ_opon"] ?></td>
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
                    <td><?php echo $offer["oryginalny_silnik"] ?></td>
                    <td>Emisja CO2</td>
                    <td><?php echo $offer["emisja_co2"] ?> g/km</td>
                </tr>
            </table>

            <table class="offer-description-table" cellspacing="0" cellpadding="0">
                <tr>
                    <th colspan="4">Historia samochodu</th>
                </tr>
                <tr>
                    <td>Kraj pochodzenia</td>
                    <td><?php echo $offer["kraj_pochodzenia"] ?></td>
                    <td>Ostatni serwis</td>
                    <td><?php echo $offer["ostatni_serwis"] ?></td>
                </tr>
                <tr>
                    <td colspan="1">Liczba kluczy</td>
                    <td><?php echo $offer["liczba_kluczy"] ?></td>
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
                    <td><?php echo $offer["numer_wewnetrzny"] ?></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>


        </div>
    </div>

    <?php include "../Modules/footer.module.php"; ?>
    <script>
        display_if_fav(<?php echo $offer["ID"] ?>)
    </script>
</body>

</html>