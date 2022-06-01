<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoStop - Kontakt</title>
    <link rel="stylesheet" href="../Css/footer.module.styles.css">
    <link rel="stylesheet" href="../Css/navbar.module.styles.css">
    <link rel="stylesheet" href="../Css/contact.module.styles.css">
</head>
<body>
    
<?php include("../Modules/navbar.module.php"); ?>

<div id="main-section">
    <h1 align="center">Kontakt</h1>
    <div id="article-section">
        <h2>Siedziba firmy</h2>
        Adres: ul. Niewiadoma 12B, 01-377 Warszawa <br>
        www: www.autostop.pl
        <h2>Nasza infolinia</h2>
        Bezpłatny numer: 111 222 333 <br>
        Poniedziałek-piątek 07:00-21:00 <br>
        Sobota i niedziela 09:00-15:00 <br>
        <br>
        Masz pytania dotyczące pojazdu lub statusu zamówienia? <br>
        Wypełnij formularz lub zadzwoń do nas, podając numer wewnętrzny samochodu oraz numer zamówienia.
        <br>
        <h2>Zadaj nam pytanie</h2>
        <div id="input-section">
            <div id="name-block">
                Imię* <br>
                <input type="text" placeholder="Imie" id="nameid">
            </div>
            <div id="phone-block">
                Telefon* <br>
                <input type="text" placeholder="+48 111 222 333" id="phoneid">
            </div>
            <div id="email-block">
                Twój adres e-mail* <br>
                <input type="text" placeholder="przykład@gmail.com" id="emailid">
            </div>
            <div id="text-block">
                <br>
                Treść zapytania <br>
                <textarea placeholder="Treść zapytania..." id="textid" rows="4" cols="50" value=""></textarea>
            </div>
        </div>
        
    </div>
</div>

<?php include("../Modules/footer.module.php"); ?>

</body>
</html>