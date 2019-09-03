$(document).ready(function () {
    var mensagem = document.getElementById("toast");
    if (mensagem != null) {
        mensagem.className = "show";
        setTimeout(function () { mensagem.className = mensagem.className.replace("show", ""); }, 3000);
    }
});

