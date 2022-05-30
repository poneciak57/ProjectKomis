const page_url = document.location.origin;
var q = document.querySelectorAll('select'),
    p = document.querySelectorAll('input');

var currentPage = 1;

let Filters = {
    "marka": null,
    "model": null,
    "paliwo_id": null,
    "skrzynia_id": null,
    "kraj_pochodzenia_id": null,
    "kolor_id": null,
    "wypadkowosc_id": null,

    "cena": null,
    "rok_produkcji": null,
    "przebieg": null/*,
    "search_bar": null,*/
}

let filtersForDisplay = {
    "marka": ["Marka: ", ""],
    "model": ["Model: ", ""],
    "paliwo_id": ["Rodzaj paliwa: ", ""],
    "skrzynia_id": ["Skrzynia biegów: ", ""],
    "kraj_pochodzenia_id": ["Kraj pochodzenia: ", ""],
    "kolor_id": ["Kolor: ", ""],
    "wypadkowosc_id": ["Wypadkowość: ", ""],
    "cena": ["Cena: ", ""],
    "rok_produkcji": ["Rok produkcji: ", ""],
    "przebieg": ["Przebieg: ", ""]
}

function createDictionary() {
    fetch(page_url + '/PHP/EndPoints/Data/filters-get.EP.php')
    .then(response => response.json())
    .then(data => {
        for (let k in data) {
            filtersForDisplay[k][1] = data[k];
        }
        
    });
    
}



function fetch_offers(callback, options) {
    const url = page_url + '/PHP/EndPoints/Data/offers-stack.EP.php?offer_page=' + currentPage;
    fetch(url, {
        method: "POST",
        mode: "same-origin",
        cache: 'no-cache',
        credentials: 'same-origin',
        body: JSON.stringify(options),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    })
        .then(response => response.json())
        .then(data => callback(data));

}

function pageSwitch(a) {
    currentPage = currentPage + a;
    refresh_offers();
}

function filters(a) {
    var x = document.getElementById('offers-filters');
    if (a) x.style.display = 'flex';
    else {
        q = document.querySelectorAll('select');
        p = document.querySelectorAll('input');
        var displayed_filters = "";
        var temp = 0;
        for (let k in Filters) {
            if (temp >= 7) {
                Filters[k] = [(p[temp - 6].value == '') ? 0 : parseInt(p[temp - 6].value), (p[temp - 5].value == '') ? 999999999 : parseInt(p[temp - 5].value)];
                filtersForDisplay[k][1] = Filters[k];
                if ((p[temp - 6].value == '') && (p[temp - 5].value == '')) Filters[k] = null;
                if (Filters[k] != null) displayed_filters += '<div class="offers-mainblock-filter">' + filtersForDisplay[k][0] + filtersForDisplay[k][1][0] + " - " + filtersForDisplay[k][1][1] + '</div>';
                temp += 2;
            } else {
                Filters[k] = (q[temp].value == 'null' || q[temp].value == '') ? null : [parseInt(q[temp].value)];
                if (Filters[k] != null) displayed_filters += '<div class="offers-mainblock-filter">' + filtersForDisplay[k][0] + filtersForDisplay[k][1][Filters[k]] + '</div>';
                temp++;
            }

        }
        document.getElementById("offers-mainblock-filters-show").innerHTML = displayed_filters;
        x.style.display = 'none';
        console.log(filtersForDisplay);
        pageSwitch(-currentPage + 1);
    };
}

function model() {
    var x = document.getElementById("offers-filters-marka"),
        z = document.getElementById("offers-filters-model"),
        y = document.getElementById("select-models");
    if (x.value != 'null') {
        z.style.display = "flex";
        fetch(page_url + '/PHP/EndPoints/Data/modelbyID.EP.php?ID=' + x.value)
            .then(response => response.text())
            .then(data => y.innerHTML = "<option value=null class='option-all'>Wszystkie</option>" + data);

    }
    else {
        z.style.display = "none";
        q[1].value = 'null';
    };

}

pageStart = (data) => {

    if (!data.loged_in) {
        window.location.href = "home.page.php?message=You got logged out";
    }
    else {
        display_offers(data);
        change_pages(data);
        createDictionary();
    }
}

/*
Przemyslec zmiane na sposob z tablica
i oddzielne rozwazanie przypadku klikniecia w liczbe a w strzalke
*/


change_pages = (data) => {
    let containerNumbers = document.getElementById("offers-wrapper-pages");
    let pagesAmount = Math.max(1, (Math.ceil(data.QuerriesFound / 10)));
    let block = '';
    let values = [0, 0];
    let arrows = document.getElementsByClassName("offers-wrapper-arrows");
    currentPage == 1 ? (arrows[1].onclick = "", arrows[0].onclick = "") : (arrows[1].onclick = function () { pageSwitch(-1) }, arrows[0].onclick = function () { pageSwitch(-(currentPage - 1)) });
    currentPage == pagesAmount ? (arrows[2].onclick = "", arrows[3].onclick = "") : (arrows[2].onclick = function () { pageSwitch(1) }, arrows[3].onclick = function () { pageSwitch(pagesAmount - currentPage) });

    if (pagesAmount <= 5) values = [1, pagesAmount];
    else {
        if (currentPage <= 3) values = [1, 5];
        else if (currentPage + 2 >= pagesAmount) values = [pagesAmount - 4, pagesAmount];
        else values = [currentPage - 2, currentPage + 2];
    }
    for (let i = values[0]; i <= values[1]; i++) {
        if (currentPage == i) block += `<a id="offers-wrapper-pages-current">${i}</a>`;
        else block += `<a onclick="pageSwitch(${i - currentPage})">${i}</a>`;
    }
    containerNumbers.innerHTML = block;

}

/**
 * sends request to server 
 * to check if user is loged 
 * if not it will log him out
 * if yes it will refresh time before logout on server 
 */
perform_action = () => {
    fetch(page_url + '/PHP/EndPoints/Login&Signup/perform_action.EP.php', {
        method: "GET",
        mode: "same-origin",
        credentials: 'same-origin',
    })
        .then(response => response.json())
        .then(data => !data.loged_in ? window.location.href = "home.page.php?message=You got logged out" : null);
}

/**
* deletes all elements equals to value
* and return array 
* @param {Array} arr
* @param {Number} value
* @returns {Array}
*/
function arrayRemove(arr, value) {

    return arr.filter(function (element) {
        return element != value;
    });
}

/**
* add offer to favourite cookie
* and switch button item to delete button
* @param {Number} id
* @param {Image} button
*/
add_to_favourites = (id, button) => {
    if (localStorage.getItem('favourites')) {
        let favs = JSON.parse(localStorage.favourites);
        favs.push(id);
        localStorage.favourites = JSON.stringify(favs);
    }
    else {
        localStorage.setItem('favourites', `[${id}]`)
    }
    // console.log(localStorage);
    button.onclick = function () { delete_from_favourites(id, button) };
    button.src = "../Sources/heart-icon-red.svg";
    perform_action();
}
/**
* delete offer from favourite cookie
* and switch button item to add button
* @param {Number} id
* @param {Image} button
*/
delete_from_favourites = (id, button) => {
    if (!localStorage.getItem('favourites')) {
        localStorage.setItem('favourites', `[]`)
    }
    else {
        let favs = JSON.parse(localStorage.favourites);
        localStorage.favourites = JSON.stringify(arrayRemove(favs, id));
    }
    // console.log(localStorage);
    button.onclick = function () { add_to_favourites(id, button) };
    button.src = "../Sources/heart-icon.svg";
    perform_action();
}
/**
* check if offer with given id is favourite
* @param {Number} id
* @returns {boolean}
*/
is_favourites = (id) => {

    if (localStorage.getItem('favourites'))
        return JSON.parse(localStorage.favourites).includes(id);

    localStorage.setItem('favourites', `[]`)
    return false;
}

display_offers = (data) => {
    let container = document.getElementById("offers-wrapper-offers");
    container.innerHTML = "";

    let ogloszen = "";
    if (data.QuerriesFound > 4 || data.QuerriesFound == 0) ogloszen = " ogłoszeń";
    else if (data.QuerriesFound > 1) ogloszen = " ogłoszenia";
    else ogloszen = " ogłoszenie";
    document.getElementById("queries_nr").innerHTML = data.QuerriesFound + ogloszen;

    data["Offers"].forEach(offer => {
        is_favourite = is_favourites(offer.ID);
        container.innerHTML += `<div class="carOffer" value="${offer.ID}" onclick="window.location = 'offers-single.page.php?ID=${offer.ID}'">
        <div class="carOffer-main">
            <div class="carOffer-img">
                <img src="data:image/jpeg;base64,${offer.zdjecie}" class="image" />
            </div>
            <div class="carOffer-content">
                <div class="carOffer-content-left">
                    <div class="carOffer-content-left-top">
                        <h2 class="carOffer-content-title">${offer.marka} ${offer.model}</h2>                            
                            <p class="carOffer-content-desc1">${offer.rok_produkcji} / ${offer.typ_paliwa} / ${offer.przebieg} km</p>
                            <p class="carOffer-content-desc2">Skrzynia biegów: <b>${offer.skrzynia}</b></p>
                    </div>
                    <div class="carOffer-content-left-bottom">
                        <p class="carOffer-content-date">02.02.2022</p>
                    </div>
                </div>
                <div class="carOffer-content-right">
                    <img src="../Sources/${is_favourite ? "heart-icon-red" : "heart-icon"}.svg" alt="heart icon" onclick="${is_favourite ? "delete_from_favourites" : "add_to_favourites"}(${offer.ID},this)">
                    <div class="carOffer-content-price">${offer.cena}zł</div>
                </div>
            </div>
        </div>
            <hr class="carOffer-line">
        </div>`
    });
    if (data.QuerriesFound == 0) {
        container.innerHTML = "<div id='carOffer-error'>Niestety nie znaleziono żadnych ogłoszeń<br><span>Proszę wybrać inne zestawienie filtrów</span></div>"
    }
}


refresh_offers = () => {
    fetch_offers(pageStart, Filters);
}

fetch_offers(pageStart, Filters);