<!DOCTYPE html>
<html lang="pl">
<?php
require_once "../PHP/Embeds/add-view.embed.php";
require_once "../Modules/logout-check.module.php";
?>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <title>Nazwa Firmy - Oferty</title>
    <link href="../Css/navbar.module.styles.css" rel="stylesheet">
    <link href="../Css/footer.module.styles.css" rel="stylesheet">
    <link href="../Css/car-offer.module.styles.css" rel="stylesheet">
    <link href="../Css/offers.page.styles.css" rel="stylesheet">
    <script src="../JS/offers.display.js" defer></script>
</head>

<body>
    <?php
    include "../Modules/navbar.module.php";
    ?>
    <div id="offers-searchBar-block">
        <div id="offers-searchBar">
            <img src="../Sources/search-icon.svg" alt="search icon" id="offers-searchBar-icon">
            <form id="offers-searchBar-form" method="post">
                <input id="offers-searchBar-searchInput">
                <hr id="offers-searchBar-hr">
                <input type="submit" id="offers-searchBar-Search" value="Szukaj">
            </form>
        </div>
    </div>
    <div id="offers-mainblock">
        <div id="offers-mainblock-filters">
            <div id="offers-mainblock-filters-main">
                <div id="offers-mainblock-filters-manage">
                    <img src="../Sources/filter-icon.svg" alt="filter icon">
                    Zarządzaj filtrami
                </div>
                <div id="offers-mainblock-filters-foundCount">Znaleźliśmy ponad&nbsp;<span id="queries_nr"></span>&nbsp;ogłoszeń</div>
            </div>
            <div id="offers-mainblock-filters-show">

            </div>
        </div>
        <div id="offers-wrapper">
            <div id="offers-wrapper-offers"></div>
            <div id="offers-wrapper-changepages">
                <img src="../Sources/double-arrow-icon.svg" alt="arrow left" id="offers-wrapper-doublearrow-left" class="offers-wrapper-arrows">
                <img src="../Sources/arrow-icon.svg" alt="arrow left" id="offers-wrapper-arrowleft" class="offers-wrapper-arrows">
                <div id="offers-wrapper-pages">
                </div>
                <img src="../Sources/arrow-icon.svg" alt="arrow right" id="offers-wrapper-arrowright" class="offers-wrapper-arrows">
                <img src="../Sources/double-arrow-icon.svg" alt="arrow left" id="offers-wrapper-doublearrow-right" class="offers-wrapper-arrows">
            </div>
        </div>
    </div>
    <?php include "../Modules/footer.module.php" ?>
</body>

</html>