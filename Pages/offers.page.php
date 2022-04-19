<?php
require_once "../PHP/Embeds/add-view.embed.php";
require_once "../Modules/logout-check.module.php";
?>

<!DOCTYPE html>
<html lang="pl">
    <?php
        require_once "../PHP/Embeds/add-view.embed.php";
        require_once "../PHP/Embeds/logout-check.embed.php";
    ?>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <title>Nazwa Firmy - Oferty</title>
    <link href="/ProjectKomis/Css/navbar.module.styles.css" rel="stylesheet">
    <link href="/ProjectKomis/Css/footer.module.styles.css" rel="stylesheet">
    <link href="/ProjectKomis/Css/offers.page.styles.css" rel="stylesheet">
    <script src="../JS/offers.display.js" defer></script>
</head>

<body>
    <?php 
        $rootdir = $_SERVER['DOCUMENT_ROOT'];
        include $rootdir."/ProjectKomis/Modules/navbar.module.php";
    ?>
    <div id="offers-searchBar-block">
        <div id="offers-searchBar">
            <img src="/ProjectKomis/Sources/search-icon.svg" alt="search icon" id="offers-searchBar-icon">
            <form id="offers-searchBar-form" method="post">
                <input id="offers-searchBar-searchInput" placeholder="111 222 333 ogłoszeń">
                <hr id="offers-searchBar-hr">
                <input type="submit" id="offers-searchBar-Search" value="Szukaj">
            </form>
        </div>
    </div>
    <div id="offers-mainblock">
        <div id="offers-mainblock-filters">
            <div id="offers-mainblock-filters-main">
                <div id="offers-mainblock-filters-manage">
                    <img src="/ProjectKomis/Sources/filter-icon.svg" alt="filter icon">
                    Zarządzaj filtrami
                </div>
                <div id="offers-mainblock-filters-foundCount">Znaleźliśmy ponad 111 222 333 ogłoszeń</div>
            </div>
            <div id="offers-mainblock-filters-show">

            </div>
        </div>
        <div id="offers-wrapper">
            <?php include $rootdir."/ProjectKomis/Modules/car-offer.module.php"?>
            <?php include $rootdir."/ProjectKomis/Modules/car-offer.module.php"?>
            <div id="offers-wrapper-changepages">
                <img src="/ProjectKomis/Sources/arrow-icon.svg" alt="arrow left" id="offers-wrapper-arrowleft" class="offers-wrapper-arrows" onclick="">
                <div id="offers-wrapper-pages">
                    <a id="offers-wrapper-pages-current">1</a>
                    <a href="">2</a>
                    <a href="">3</a>
                </div>
                <img src="/ProjectKomis/Sources/arrow-icon.svg" alt="arrow right" id="offers-wrapper-arrowright" class="offers-wrapper-arrows" onclick="">
            </div>
        </div>
    </div>
    <?php include $rootdir."/ProjectKomis/Modules/footer.module.php"?>
</body>
</html>