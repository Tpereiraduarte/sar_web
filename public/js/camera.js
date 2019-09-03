window.onload = function () {
    var evento = null;

    $('.start-video').on('click', startCamera);

    $('.stop-video').on('click', stopCamera);

    $('.take-picture').on('click', tirarFoto);

    $('.reposta-sim').on('click', valorDaImagem);

    function startCamera(ev) {
        getLocation();
        evento = ev.currentTarget.parentNode;
        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' }, audio: true })
            .then((stream) => {
                document.getElementById('videoFeed').srcObject = stream
            })
    }

    function stopCamera() {
        document.getElementById('videoFeed')
            .srcObject
            .getVideoTracks()
            .forEach(track => track.stop())
    }

    function tirarFoto(ev) {
        const canvas = document.getElementById('picture-canvas');
        const context = canvas.getContext('2d');
        const video = document.getElementById('videoFeed');
        canvas.width = video.offsetWidth
        canvas.height = video.offsetHeight
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        canvas.toBlob(function (blob) {
            const url = URL.createObjectURL(blob)
            stopCamera();
            setImagem(url);
        }, 'image/jpeg', 0.95);
        //closeCamera()
        let input = document.getElementById('capture');
        let img = document.getElementById('img');
    }

    function setImagem(obj) {
        evento.lastElementChild.value = obj;
        evento.style.backgroundColor = '#fdcece';
    }

    function valorDaImagem(ev) {
        var checkbox = $(ev.target);
        var coluna = ev.currentTarget.parentNode;
        var quantTrash = checkbox.siblings(".reposta-sim");
        coluna.lastElementChild.value = null;
        coluna.style.backgroundColor = '#85f1847a';
    }
};