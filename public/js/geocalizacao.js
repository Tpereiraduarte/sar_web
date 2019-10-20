var local = document.getElementById("geocalizacao");
var mensagem = document.getElementById("mensagem");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    }
    else { mensagem.innerHTML = "Seu browser não suporta Geolocalização."; }
}

function showPosition(position) {
    local.value = "Latitude: " + position.coords.latitude +
        "Longitude: " + position.coords.longitude;
}

function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            mensagem.innerHTML = "Usuário rejeitou a solicitação de Geolocalização."
            break;
        case error.POSITION_UNAVAILABLE:
            mensagem.innerHTML = "Localização indisponível."
            break;
        case error.TIMEOUT:
            mensagem.innerHTML = "A requisição expirou."
            break;
        case error.UNKNOWN_ERROR:
            mensagem.innerHTML = "Algum erro desconhecido aconteceu."
            break;
    }
}