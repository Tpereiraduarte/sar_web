var evento = null;
$('.start-video').iCheck({
    radioClass: 'iradio_square-red',
});
$('.reposta-sim').iCheck({
    radioClass: 'iradio_square-green',
});

$('.reposta-sim').on('ifChecked', function (event) {
    evento = event.currentTarget.parentNode;
    valorDaImagem(evento);
});

$('.start-video').on('ifChecked', function (event) {
    evento = event.currentTarget.parentNode;
    getLocation();
    self.executar();
});

function executar() {
    $(evento.parentElement.parentElement.lastElementChild).trigger('click');
    evento.parentElement.parentNode.parentNode.style.backgroundColor = '#fdcece';
}

function valorDaImagem(evento) {
    var coluna = evento.parentElement.parentElement.lastElementChild;
    coluna.value = null;
    evento.parentElement.parentNode.parentNode.style.backgroundColor = '#85f1847a';
}