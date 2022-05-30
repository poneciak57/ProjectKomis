function next() {
    var email = document.getElementById("email").value;
    var input = document.getElementById("email");
    var wynik = document.getElementById("register");
    var utworz = document.getElementById("create");
    var show_password = document.getElementById("show_password");
    var more_options = document.getElementById("more_options");
    var pass = document.getElementById("haslo");
    var haslo = document.getElementById("haslo").value;

    if (email.length == 0) {

        input.placeholder = "Podaj login!"
    } else {

        wynik.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" id="expand2" onclick="Cofanie()" viewBox="0 0 96 96"><switch><g><path d="M52 83.999V21.655l21.172 21.172a4 4 0 1 0 5.656-5.657l-28-28a4 4 0 0 0-5.656 0l-28 28A3.987 3.987 0 0 0 16 39.999a4 4 0 0 0 6.828 2.828L44 21.655v62.344a4 4 0 0 0 8 0z"/></g></switch></svg><h3>' + email + '</h3>';
        utworz.style.display = "flex";
        utworz.innerHTML = "<h1>Utwórz hasło</h1>";
        input.style.display = "none";
        pass.style.display = "flex";
        more_options.style.display = "none";
        show_password.style.display = "flex";

        if (haslo.length == 0) {
            console.log(haslo.length);
            pass.placeholder = "Podaj hasło!";
        } else {
            CheckPassword();
        }



    }
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
    var show_password = document.getElementById("show_password");

    var more_options = document.getElementById("more_options");

    wynik.innerHTML = '<h1>Rejestracja</h1>';
    document.getElementById("haslo").value = null;
    utworz.style.display = "none";
    input.style.display = "flex";
    haslo.style.display = "none";
    more_options.style.display = "flex";
    show_password.style.display = "none";


}