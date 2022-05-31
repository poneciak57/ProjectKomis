const strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{12,})')
const mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')
let timeout;
var password = document.getElementById("haslo");
var strange = document.getElementById("strangebar");
var pasek = document.getElementById("pasek");
var opis = document.getElementById("opis_id");

function next() {
    var email = document.getElementById("email").value;
    var input = document.getElementById("email");
    var wynik = document.getElementById("register");
    var utworz = document.getElementById("create");
    var show_password = document.getElementById("show_password");
    var more_options = document.getElementById("more_options");

    var form_button = document.getElementById("form_button");

    if (email.length == 0) {

        input.placeholder = "Podaj login"
    } else {

        wynik.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" id="expand2" onclick="Cofanie()" viewBox="0 0 96 96"><switch><g><path d="M52 83.999V21.655l21.172 21.172a4 4 0 1 0 5.656-5.657l-28-28a4 4 0 0 0-5.656 0l-28 28A3.987 3.987 0 0 0 16 39.999a4 4 0 0 0 6.828 2.828L44 21.655v62.344a4 4 0 0 0 8 0z"/></g></switch></svg><h3 style="margin-left: 1vh;">' + email + '</h3>';
        utworz.style.display = "flex";
        utworz.innerHTML = "<h1>Utwórz hasło</h1>";
        input.style.display = "none";
        password.style.display = "flex";
        more_options.style.display = "none";
        show_password.style.display = "flex";
        form_button.innerHTML = '<input type="submit" value="Zarejestruj" class="Dalej" id="przycisk">';

    }
}



passbar = (x) => {

    if (strongPassword.test(x)) {
        pasek.style.backgroundColor = "lime"
        opis.textContent = 'Strong'
        pasek.style.width = "30vh";
    } else if (mediumPassword.test(x)) {
        pasek.style.backgroundColor = 'gold'
        opis.textContent = 'Medium'
        pasek.style.width = "20vh";
    } else {
        pasek.style.backgroundColor = 'crimson'
        opis.textContent = 'Weak'
        pasek.style.width = "10vh";
    }
}

submit1 = (e) => {

    var haslo = document.getElementById("haslo").value;

    if (haslo.length == 0) {
        e.preventDefault();
        password.placeholder = "Podaj hasło";
        return false;
    }
}
password.addEventListener("input", () => {


    strange.style.display = 'flex'
    clearTimeout(timeout);



    timeout = setTimeout(() => passbar(password.value), 1);



    if (password.value.length !== 0) {
        strange.style.display != 'flex'
    } else {
        strange.style.display = 'none'
    }
});

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
    var form_button = document.getElementById("form_button");

    var more_options = document.getElementById("more_options");

    wynik.innerHTML = '<h1>Rejestracja</h1>';
    document.getElementById("haslo").value = null;
    utworz.style.display = "none";
    input.style.display = "flex";
    haslo.style.display = "none";
    more_options.style.display = "flex";
    show_password.style.display = "none";
    form_button.innerHTML = '<button type="button" onclick="next()" id="przycisk" class="Dalej">Dalej</button>';

}