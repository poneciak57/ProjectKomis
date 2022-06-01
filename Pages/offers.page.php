<!DOCTYPE html>
<html lang="pl">
<?php
require_once "../Modules/logout-check.module.php";
require_once "../PHP/Classes/Structs/user.struct.php";

$is_admin = (unserialize($_SESSION["User"])->Privileges == 1);
?>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <title>AutoStop - Oferty</title>
    <link href="../Css/navbar.module.styles.css" rel="stylesheet">
    <link href="../Css/footer.module.styles.css" rel="stylesheet">
    <link href="../Css/car-offer.module.styles.css" rel="stylesheet">
    <link href="../Css/offers.page.styles.css" rel="stylesheet">
    <script src="../JS/offers.display.js" defer></script>
</head>

<body>
    <div id="offers-filters">
        <div id="offers-filters-block">
            <?php
            require_once  __DIR__ . "/../PHP/Classes/form-options.controller.php";
            $OptC = new OptionsController();
            ?>
            <div id="offers-filters-block-title">
                Filtry
                <input type="image" src="../Sources/x-icon.svg" onclick="filters(false)">
            </div>
            <div class="offers-filters-block-filter">
                <div class="offers-filters-block-filter-title">Marka</div>
                <select name="brands" onChange="model()" id="offers-filters-marka">
                    <option value=null class="option-all">Wszystkie</option>
                    <?php $OptC->Brands(); ?>
                </select>
            </div>
            <div class="offers-filters-block-filter" id="offers-filters-model" style="display: none;">
                <div class="offers-filters-block-filter-title">Model</div>
                <select name="models" id="select-models">

                </select>
            </div>
            <div class="offers-filters-block-filter">
                <div class="offers-filters-block-filter-title">Cena</div>
                <div class="offers-filters-block-filter-doubleinput">
                    <input type="number" placeholder="Od">
                    <input type="number" placeholder="Do">
                </div>
            </div>
            <div class="offers-filters-block-filter">
                <div class="offers-filters-block-filter-title">Rok produkcji</div>
                <div class="offers-filters-block-filter-doubleinput">
                    <input type="number" placeholder="Od">
                    <input type="number" placeholder="Do">
                </div>
            </div>
            <div class="offers-filters-block-filter">
                <div class="offers-filters-block-filter-title">Przebieg</div>
                <div class="offers-filters-block-filter-doubleinput">
                    <input type="number" placeholder="Od">
                    <input type="number" placeholder="Do">
                </div>
            </div>
            <div class="offers-filters-block-filter">
                <div class="offers-filters-block-filter-title">Paliwo</div>
                <select name="fuels">
                    <option value=null class="option-all">Wszystkie</option>
                    <?php $OptC->Fuels(); ?>
                </select>
            </div>
            <div class="offers-filters-block-filter">
                <div class="offers-filters-block-filter-title">Skrzynia biegów</div>
                <select name="gearboxes">
                    <option value=null class="option-all">Wszystkie</option>
                    <?php $OptC->Gearboxes(); ?>
                </select>
            </div>
            <div class="offers-filters-block-filter">
                <div class="offers-filters-block-filter-title">Kraj pochodzenia</div>
                <select name="countries">
                    <option value=null class="option-all">Wszystkie</option>
                    <?php $OptC->Countries(); ?>
                </select>
            </div>
            <div class="offers-filters-block-filter">
                <div class="offers-filters-block-filter-title">Kolor</div>
                <select name="colors">
                    <option value=null class="option-all">wszystkie</option>
                    <?php $OptC->Colors(); ?>
                </select>
            </div>
            <div class="offers-filters-block-filter">
                <div class="offers-filters-block-filter-title">Powypadkowy</div>
                <select name="crashes">
                    <option value=null class="option-all">Wszystkie</option>
                    <option value=1 class="option-all">Tak</option>
                    <option value=2 class="option-all">Nie</option>
                </select>
            </div>
        </div>
    </div>
    <?php
        include "../Modules/navbar.module.php";
    ?>
    <div id="offers-mainblock">
        <div id="offers-mainblock-filters">
            <div id="offers-mainblock-filters-main">
                <div style="display: flex;">
                    <div id="offers-mainblock-filters-manage" onclick="filters(true)">
                        <img src="../Sources/filter-icon.svg" alt="filter icon">
                        Zarządzaj filtrami
                    </div>
                    <?php 
                        if($is_admin) {
                            echo "<div id=\"offers-mainblock-addoffer\" onclick=\"window.location = 'admin-offers-single-add.page.php'\"><img src=\"../Sources/plus-icon.svg\" alt=\"filter icon\">Dodaj ofertę</div>";
                        }
                    ?>
                    
                    
                </div>
                <div id="offers-mainblock-filters-foundCount">Znaleźliśmy <span id="queries_nr"></span></div>
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