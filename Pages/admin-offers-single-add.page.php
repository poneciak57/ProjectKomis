<?php
    require_once "../Modules/logout-check.module.php";
    require_once "../PHP/Classes/offers.controller.php";
    require_once "../PHP/Classes/Structs/user.struct.php";

    if (unserialize($_SESSION["User"])->Privileges != 1) {
        header("location: /Pages/offers.page.php?message=Wrong privilages");
    }

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
        <script src="../JS/admin-offers-add.js"></script>
    </head>

    <body>
        <?php include "../Modules/navbar.module.php"; ?>

        <form action="../PHP/EndPoints/Data/offer-add.EP.php" method="POST" enctype="multipart/form-data">
            <div id="offer-main-div">
                <div id="offer-image-div" onclick="document.getElementById('zdjecie').click();">
                    <input type="file" id="zdjecie" name="zdjecie" required>
                </div>
                <div id="offer-maininfo">
                    <div id="offer-maininfo-title">
                        Marka&nbsp;<select name="marka" id="offers-filters-marka" onchange="model(this.value)"><?php $OptC->Brands(); ?></select>&nbsp;&nbsp;&nbsp;Model&nbsp;<span id="offer-maininfo-title-model"></span>
                    </div>
                    <div id="offer-maininfo-price">
                    <div id="offer-maininfo-price-text">
                        <div><input type="number" name="cena" value=""> zł</div>
                        <div id="offer-maininfo-price-text-monthly">od
                            zł miesięcznie <br><span style="font-size: var(--small-font-size); float: right;">okres leasingu: 5 lat</span></div>
                    </div>
                    <div id="offer-maininfo-price-buttondiv">
                        <button type="submit" name="submit" value="Kup teraz" id="offer-maininfo-price-button">Zapisz</button>
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
                        <td><input type="number" name="przebieg" value=""> km</td>
                    </tr>
                    <tr>
                        <td>Rodzaj paliwa</td>
                        <td><select name="paliwo_id"><?php $OptC->Fuels(); ?></select></td>
                        <td>Skrzynia biegów</td>
                        <td><select name="skrzynia_id"><?php $OptC->Gearboxes(); ?></select></td>
                    </tr>
                    <tr>
                        <td colspan="1">Moc</td>
                        <td><input type="number" name="moc_silnika" value=""> KM</td>
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
                        <td><input type="number" name="Liczba_drzwi" value=""></td>
                        <td>Liczba miejsc</td>
                        <td><input type="number" name="Liczba_miejsc" value=""></td>
                    </tr>
                    <tr>
                        <td>Kolor</td>
                        <td><select name="kolor_id"><?php $OptC->Colors(); ?></select></td>
                        <td>Tapicerka</td>
                        <td><input type="text" name="Tapicerka" value=""></td>
                    </tr>
                    <tr>
                        <td colspan="1">Typy opon</td>
                        <td><input type="text" name="Typ_opon" value=""></td>
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
                        <td><input type="number" name="Emisja_CO2" value="">g/km</td>
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
                        <td><input type="text" name="Ostatni_serwis" value=""></td>
                    </tr>
                    <tr>
                        <td colspan="1">Liczba kluczy</td>
                        <td><input type="number" name="Liczba_kluczy" value=""></td>
                        <td>Wypadkowość</td>
                        <td><select name="wypadkowosc_id"><?php $OptC->Crashes(); ?></select></td>
                    </tr>
                </table>

                <table class="offer-description-table" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="4">Dane samochodu</th>
                    </tr>
                    <tr>
                        <td colspan="1">Numer wewnętrzny</td>
                        <td><input type="text" name="Numer_wewnetrzny" value=""></td>
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