<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="">
    <title>Nazwa Firmy - Oferty</title>
    <link href="../Css/navbar.module.styles.css" rel="stylesheet">
    <link href="../Css/footer.module.styles.css" rel="stylesheet">
    <link href="../Css/home.page.styles.css" rel="stylesheet">
    <?php
        require_once "../PHP/Functions/logout-check.func.php";
        $bool = logout_check() == LoginState::Loged_In;
        echo '<link'.(($bool) ? ' href="../Css/home.navbar.styles.css"' : ' href="../Css/home2.navbar.styles.css"').' rel="stylesheet">';
    ?>

</head>

<body>

    <?php include "../Modules/navbar.module.php" ?>
    <div id="home-video">
     <video loop muted autoplay>
          <source src="../Sources/projekcior.mp4" type="video/mp4">
     </video>
        <span id="home-video-quote">Z naszymi samochodami zajedziesz najdalej</span>
    </div>
    <div id="home-benefits">
        <div id="home-benefits-title">
            <h1>Zakup samochodu używanego</h1>
            <hr>
        </div>
        <div id="home-benefits-blocks">
            <div class="home-benefits-block">
                <img src="../Sources/tire-icon.svg" alt="tire icon">
                <h1>Wygodnie</h1>
                <hr>
                <div id="home-benefits-block-text">
                W prosty sposób kupujesz swój samochód online. Następnie my dostarczamy go pod Twój dom – i to w całej Polsce.
                </div>
            </div>
        
            <div class="home-benefits-block">
            <img src="../Sources/tire-icon.svg" alt="tire icon">
                <h1>Bezpiecznie</h1>
                <hr>
                <div id="home-benefits-block-text">
                Z nami jesteś bezpieczny przez cały czas – z 14-dniowym prawem do zwrotu oraz 12-miesięczną gwarancją.
                </div>
            </div>
            <div class="home-benefits-block">
                <img src="../Sources/tire-icon.svg" alt="tire icon">
                <h1>Indywidualnie</h1>
                <hr>
                <div id="home-benefits-block-text">
                Z nami masz zawsze dowolność wyboru. Od finansowania po zakres gwarancji, to Ty składasz zamówienie wedle własnych życzeń.
                </div>
            </div>
        </div>
        <div id="home-check-offer">
            <h1>Sprawdź naszą ofertę</h1>
            <button onclick="window.location = '<?php echo ($bool ? 'offers.page.php' : 'login.page.php')?>'"><?php echo ($bool ? 'Sprawdź' : 'Zaloguj się')?></button>
        </div>
    </div>
    <?php
        
        require_once("../PHP/Classes/statistics.class.php");
        $PV = new Statistics;
    ?>
    <div id="home-statistics-div">
        <div id="home-statistics">
            <img src="../Sources/grid-spacing.svg" id="home-statistics-grid-spacing">
            <div class="home-statistics-block">
                <img src="../Sources/user-icon.svg" alt="user icon">
                <div class="home-statistics-block-text">
                    Zaufało nam już<br><span><?php  echo $PV->Clients();?> osób</span>
                </div>
            </div>
            <div class="home-statistics-block">
                <div class="home-statistics-block-text">
                    Odwiedzin strony<br><span><?php  echo $PV->Views();?> </span>
                </div>
                <img src="../Sources/eye-icon.svg" alt="eye icon">
            </div>
            <div class="home-statistics-block">
                <img src="../Sources/car-icon.svg" alt="car icon">
                <div class="home-statistics-block-text" style="margin-right: 5vh;">
                    Liczba ofert<br><span><?php  echo $PV->Offers();?> </span>
                </div>
            </div>
            <div class="home-statistics-block">
                <div class="home-statistics-block-text" style="margin-left: 2vh;">
                    Ocena klientów<br><span><?php  echo $PV->Clients();?> / 5</span>  
                </div>
                <img src="../Sources/star-icon.svg" alt="star icon">
            </div>
        </div>
    </div>
    <?php include "../Modules/footer.module.php" ?>
</body>

</html>