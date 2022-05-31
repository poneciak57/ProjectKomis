<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>

    <link rel="stylesheet" href="../Css/login.page.styles.css">
    <style>
        .form-more_options a {
            color: #117FBD;
            text-decoration: none;
            font-size: var(--small-font-size);
        }
        
        #haslo {
            display: none;
        }
    </style>
</head>

<body>

    <div id="tlo">
        <div class="form" id="Form">
            <div id="form-top">
                <div id="img"></div>
                <h2 class="form-name">AutoStop</h2>
            </div>
            <div id="register">
                <h1>Zaloguj</h1>
            </div>
            <div id="create">

            </div>
            <form action="../PHP/EndPoints/Login&Signup/login.EP.php" method="GET">
                <input type="text" name="login" placeholder="Login" id="email"><br>
                <input type="password" name="password" placeholder="Hasło" id="haslo">
                <div class="form-bottom">

                    <div class="form-more_options" id="form-more_options">
                        Nie masz konta? <a href="register.page.php">&nbsp;Zarejestruj się!</a>
                    </div>
                    <div class="form_button" id="form_button">
                        <button type="button" onclick="next()" id="przycisk" class="Dalej">Dalej</button>
                    </div>
            </form>
            </div>
        </div>

        <div class="privacy_policy">
            <div id="img" onclick="window.location = '../Documents/Polityka_prywatnosci.pdf'"><img src="../Sources/note-icon.svg" alt="note icon"></div>
            <h3>Polityka prywatności</h3>
        </div>
    </div>



</body>
<script src="../../JS/script2.js"></script>

</html>

</body>