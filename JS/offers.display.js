const page_url = document.location.origin;
var currentPage = 1;

function fetch_offers(callback) {
    const url = page_url + '/PHP/EndPoints/Data/offers-stack.EP.php?offer_page=' + currentPage;
    fetch(url, {
        method: "GET",
        mode: "same-origin",
        cache: 'no-cache',
        credentials: 'same-origin'
    })
        .then(response => response.json())
        .then(data => callback(data));
        
}

function pageSwitch(a) {
    currentPage = currentPage + a;
    refresh_offers();
}

pageStart = (data) => {
    console.log(data);
    if (!data.loged_in) {
        window.location.href = "home.page.php?message=You got logged out";
    }
    else {
        display_offers(data);
        change_pages(data);
    }
}
fetch_offers(pageStart);

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

change_pages = (data) => {
    let containerNumbers = document.getElementById("offers-wrapper-pages");
    let pagesAmount = data.QuerriesFound/10;
    let block = '';
    let arrows = document.getElementsByClassName("offers-wrapper-arrows");
    currentPage == 1 ? (arrows[1].onclick = "", arrows[0].onclick = "") : (arrows[1].onclick = function(){pageSwitch(-1)}, arrows[0].onclick = function() {pageSwitch(-(currentPage-1))});
    currentPage == pagesAmount ? (arrows[2].onclick = "", arrows[3].onclick = "") : (arrows[2].onclick = function(){pageSwitch(1)}, arrows[3].onclick = function() {pageSwitch(pagesAmount-currentPage)});
    console.log(arrows)

    let temp = currentPage-2;
    if(currentPage+1 >= pagesAmount) temp = pagesAmount - 4;
    if(currentPage <= 3) temp = 1;
    for(let i = temp; i < temp+5; i++) {
        if(i == currentPage) block += `<a id="offers-wrapper-pages-current">${i}</a>`;
        else if(i > currentPage) block += `<a onclick="pageSwitch(${i-currentPage})">${i}</a>`;
        else block += `<a onclick="pageSwitch(${i-currentPage})">${i}</a>`;
    }
    containerNumbers.innerHTML = block;
}


refresh_offers = () => {
    fetch_offers(pageStart);
}