const page_url = document.location.origin;
function next() {
    var email = document.getElementById("email").value;
    var haslo = document.getElementById("haslo").value;
    var input = document.getElementById("email");
    var pass = document.getElementById("haslo");
    var wynik = document.getElementById("register");
    var forgor = document.getElementById("form-more_options");
    var wprowadz = document.getElementById("create");
    var utworz = document.getElementById("create");

    var przycisk = document.getElementById("przycisk");
    var form_button = document.getElementById("form_button");

    fetch(page_url + `/PHP/EndPoints/Data/check-login.EP.php?login=${email}`)
        .then(response => response.json())
        .then(data => {
            if (data.IsLoginCorrect) {
                if (email.length == 0) {
                    input.placeholder = "Podaj login!"
                } else {

                    forgor.innerHTML = "<a href=''>Nie pamiętasz hasła?</a>";
                    forgor.style.fontSize = "1.75vh";
                    forgor.style.fontWeight = "100";
                    wprowadz.innerHTML = "<h2>Wprowadź hasło</h2>";
                    wynik.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" id="expand2" onclick="Cofanie()" viewBox="0 0 96 96"><switch><g><path d="M52 83.999V21.655l21.172 21.172a4 4 0 1 0 5.656-5.657l-28-28a4 4 0 0 0-5.656 0l-28 28A3.987 3.987 0 0 0 16 39.999a4 4 0 0 0 6.828 2.828L44 21.655v62.344a4 4 0 0 0 8 0z"/></g></switch></svg><h3>' + email + '</h3>';
                    utworz.style.display = "flex";
                    utworz.innerHTML = "<h1>Wprowadź hasło</h1>";
                    input.style.display = "none";
                    pass.style.display = "flex";
                    przycisk.display = "none";
                    form_button.innerHTML = "<input class='Dalej' value='Dalej' type='submit'>"
                    if (haslo.length == 0) {
                        pass.placeholder = "Podaj hasło!";
                    } else {
                        CheckPassword();
                    }
                }
            } else {

                wprowadz.innerHTML = "Login jest niepoprawny!";
                wprowadz.style.color = "red";
                input.style.borderColor = "red";
            }
        })
}

function CheckPassword() {

    var passw = /[A-Z]/;
    var passw2 = /[a-z]/;

    if (document.getElementById("haslo").value.match(passw) && document.getElementById("haslo").value.match(passw2)) {
        return true;
    } else {
        return false;
    }
}

function pokaz() {
    var haslo = document.getElementById("haslo");
    if (haslo.type === "password") {
        haslo.type = "text";
    } else {
        haslo.type = "password";
    }
}

function Cofanie() {
    var wynik = document.getElementById("register");
    var utworz = document.getElementById("create");
    var input = document.getElementById("email");
    var haslo = document.getElementById("haslo");
    var forgor = document.getElementById("form-more_options");
    wynik.innerHTML = '<h1>Zaloguj</h1>';
    document.getElementById("haslo").value = null;
    utworz.style.display = "none";
    input.style.display = "flex";
    haslo.style.display = "none";
    forgor.innerHTML = ' Nie masz konta? <a href="registracja.html">&nbsp;Zarejestruj się!</a>';

}