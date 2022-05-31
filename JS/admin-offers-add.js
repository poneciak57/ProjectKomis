const page_url = document.location.origin;

function model(a) {
    var x = document.getElementById("offers-filters-marka"),
        y = document.getElementById("offer-maininfo-title-model");
    if (x.value != 'null') {
        fetch(page_url + '/PHP/EndPoints/Data/modelbyID.EP.php?ID=' + a)
            .then(response => response.text())
            .then(data => y.innerHTML = "<select name='model_id'>" + data + "</select>");
    }

}