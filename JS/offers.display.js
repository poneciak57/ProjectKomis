const page_url = document.location.origin;
var currentPage = 1;

let Filters = {
    "model": {
        "0": 1
    },
    "marka": null,
    "paliwo_id": null,
    "skrzynia_id": null,
    "cena": null,
    "przebieg": null,
    "rok_produkcji": null,
    "kraj_pochodzenia_id": null,
    "wypadkowosc_id": null,
    "kolor_id": null,
    "search_bar": null
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

pageStart = (data) => {
    //console.log(data); // response data console log 
    if (!data.loged_in) {
        window.location.href = "home.page.php?message=You got logged out";
    }
    else {
        display_offers(data);
        change_pages(data);
    }
}

/*
Przemyslec zmiane na sposob z tablica
i oddzielne rozwazanie przypadku klikniecia w liczbe a w strzalke
*/
change_pages = (data) => {
    let containerNumbers = document.getElementById("offers-wrapper-pages");
    let pagesAmount = Math.ceil(data.QuerriesFound / 10);
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
display_offers = (data) => {
    let container = document.getElementById("offers-wrapper-offers");
    container.innerHTML = "";
    document.getElementById("queries_nr").innerHTML = data.QuerriesFound;
    document.getElementById("offers-searchBar-searchInput").placeholder = "Szukaj pośród ponad " + data.QuerriesFound + " ogłoszeń";
    data["Offers"].forEach(offer => {
        container.innerHTML += `<div class="carOffer" value="${offer.Id}">
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
                    <img src="../Sources/heart-icon.svg" alt="heart icon" onclick="">
                    <div class="carOffer-content-price">${offer.cena}zł</div>
                </div>
            </div>
        </div>
            <hr class="carOffer-line">
        </div>`
    });
}


refresh_offers = () => {
    fetch_offers(pageStart, Filters);
}

fetch_offers(pageStart, Filters);