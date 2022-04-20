const page_url = document.location.origin;
const url = page_url + '/PHP/EndPoints/Data/offers-stack.EP.php?offer_page=1';

function fetch_offers(callback) {
    fetch(url, {
        method: "GET",
        mode: "same-origin",
        cache: 'no-cache',
        credentials: 'same-origin'
    })
        .then(response => response.json())
        .then(data => callback(data));
}


display_offers = (data) => {
    let container = document.getElementById("offers-wrapper");
    console.log(data);
    if (!data.loged_in)
        window.location.href = "home.page.php?message=You got loged out";
    else {
        container.innerHTML = `<h1> Number of Querries found: ${data.QuerriesFound}</h1><br>`
        data["Offers"].forEach(offer => {
            container.innerHTML += `<div>ID: ${offer.ID}<img src="data:image/jpeg;base64,${offer.zdjecie}"/></div>`
        });
    }
}
fetch_offers(display_offers);


refresh_offers = () => {
    let container = document.getElementById("offers-wrapper");
    container.innerHTML = "";
    fetch_offers(display_offers);
}