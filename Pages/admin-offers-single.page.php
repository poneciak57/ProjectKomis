<?php
require_once "../Modules/logout-check.module.php";
require_once "../PHP/Classes/offers.controller.php";

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
        <div id="offer-main-div">

            <div id="offer-image-div" onclick="document.getElementById('zdjecie').click();">
                <input type="file" id="zdjecie" name="zdjecie">
            </div>
            <div id="offer-maininfo">
                <div id="offer-maininfo-title">
                    Marka&nbsp;<input type="text" name="marka">&nbsp;&nbsp;&nbsp;Model&nbsp;<input type="text" name="model">
                </div>
                <div id="offer-maininfo-price">
                    <div id="offer-maininfo-price-text">
                        <div><input type="number" name="cena"> zł</div>
                        <div id="offer-maininfo-price-text-monthly">od
                             zł miesięcznie <br><span style="font-size: var(--small-font-size); float: right;">okres leasingu: 5 lat</span></div>
                    </div>
                    <div id="offer-maininfo-price-buttondiv">
                        <button value="Kup teraz" id="offer-maininfo-price-button">Zapisz</button>
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
                        <td><input type="text" name="rok_produkcji"></td>
                        <td>Przebieg</td>
                        <td><input type="number" name="Przebieg"> km</td>
                    </tr>
                    <tr>
                        <td>Rodzaj paliwa</td>
                        <td><input type="text" name="paliwo"></td>
                        <td>Skrzynia biegów</td>
                        <td><input type="text" name="skrzynia"></td>
                    </tr>
                    <tr>
                        <td colspan="1">Moc</td>
                        <td><input type="number" name="moc"> KM</td>
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
                        <td><input type="number" name="drzwi"></td>
                        <td>Liczba miejsc</td>
                        <td><input type="number" name="miejsca"></td>
                    </tr>
                    <tr>
                        <td>Kolor</td>
                        <td><input type="text" name="kolor"></td>
                        <td>Tapicerka</td>
                        <td><input type="text" name="tapicerka"></td>
                    </tr>
                    <tr>
                        <td colspan="1">Typy opon</td>
                        <td><input type="text" name="opony"></td>
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
                        <td><input type="text" name="oryg_silnik"></td>
                        <td>Emisja CO2</td>
                        <td><input type="number" name="emisja">g/km</td>
                    </tr>
                </table>

                <table class="offer-description-table" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="4">Historia samochodu</th>
                    </tr>
                    <tr>
                        <td>Kraj pochodzenia</td>
                        <td><input type="text" name="kraj_poch"></td>
                        <td>Ostatni serwis</td>
                        <td><input type="text" name="o_serwis"></td>
                    </tr>
                    <tr>
                        <td colspan="1">Liczba kluczy</td>
                        <td><input type="number" name="klucze"></td>
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
                        <td><input type="number" name="numer_wewnetrzny"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>


            </div>
        </div>

        <?php include "../Modules/footer.module.php"; ?>
    </body>

    </html>