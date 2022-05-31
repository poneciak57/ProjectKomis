<nav id="navbar">
    <div id="navbar-logo" onclick="window.location = 'home.page.php'">
        <div id="navbar-logo-image"></div>
        Komis Samochodowy<br>AutoStop
    </div>

    <div id="navbar-pages">
        <div class="navbar-page" onclick="window.location = 'contact.page.php'">
            Kontakt
        </div>
        <div class="navbar-page" onclick="window.location = 'offers.page.php'">
            Oferty
        </div>
        <div class="navbar-page" onclick="window.location = 'profile.page.php'">
            <img src="../Sources/user-icon-white.svg" alt="user icon" class="navbar-icons">
            Mój profil
        </div>

        <div class="navbar-page" onclick="window.location = '../PHP/EndPoints/Login&Signup/logout.EP.php'">
            Wyloguj
        </div>
        <div id="navbar-page-login" class="navbar-page" onclick="window.location = 'login.page.php'" >
            <img src="../Sources/user-icon-white.svg" alt="user icon" class="navbar-icons">
            Zaloguj się
        </div>
    </div>
</nav>