<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>

    <link rel="stylesheet" href="../Css/login.page.styles.css">

</head>

<body>

    <div id="tlo">
        <div class="form" id="Form">
            <div id="form-top">
                <div id="img">

                </div>
                <div class="form-name">AutoStop</div>
            </div>
            <div id="register">
                <h1>Rejestracja</h1>
            </div>
            <div id="create"></div>
            <form method="POST" onsubmit="return submit1(event)" action="../PHP/EndPoints/Login&Signup/signup.EP.php">
                <div id="input">
                    <input type="text" name="Login" placeholder="Login" id="email"><br>

                    <input type="password" name="password" id="haslo" placeholder="Hasło" value="">


                </div>
                <div class="form-bottom">

                    <div class="form-more_options" id="form-more_options">
                        <div id="more_options">

                        </div>

                        <div id="show_password">
                            <input type="checkbox" onclick="pokaz()">
                            <h3>Pokaż hasło</h3>
                        </div>
                        <div id="zamk">
                            <div id="strangebar">
                                <div id="indykator">
                                    <b id="opis_id"> Weak</b> &nbsp;
                                </div>
                                <div id="pasek">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form_button" id="form_button">
                        <button type="button" onclick="next() " class="Dalej">Dalej</button>
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
<script src="../../JS/script.js "></script>

</html>