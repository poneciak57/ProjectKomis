const page_url = document.location.origin;
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
display_if_fav = (id) => {
    let heart = document.getElementById("fav-heart-container");
    if (localStorage.getItem('favourites')) {
        if (JSON.parse(localStorage.favourites).includes(id)) {
            heart.onclick = function () { delete_from_favourites(id, heart) };
            heart.src = "../Sources/heart-icon-red.svg";
            return;
        }
    }
    else {
        localStorage.setItem('favourites', `[]`)
    }
    heart.onclick = function () { add_to_favourites(id, heart) };
    heart.src = "../Sources/heart-icon.svg";
}