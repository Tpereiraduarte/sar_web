var pieData = [{
        value: dados[0][0].pendente,
        color: "#f39c12",
        highlight: "#FFC870",
        label: "Pendente"
    }, {
        value: dados[1][0].finalizado,
        color: "#00a65a",
        highlight: "#0dca73",
        label: "Finalizado"
    }, {
        value: dados[2][0].cancelado,
        color: "#F7464A",
        highlight: "#FF5A5E",
        label: "Cancelado"
    }
];

window.onload = function() {
    let total = dados[0][0].pendente + dados[1][0].finalizado + dados[2][0].cancelado;
    let pendente = dados[0][0].pendente;
    let respondido = dados[1][0].finalizado + dados[2][0].cancelado;

    $("#total").append(total);
    $("#pendente").append(pendente);
    $("#respondido").append(respondido);

    let status = document.getElementsByClassName("status");
    debugger
    status.map(function(obj, value){
        $(value).status.innerText == "F";
    });
    if(status.innerText == "F"){
        $( "#status" ).addClass( "label label-success" );
        $('#status').prop('title', 'Finalizado');
    }else{
        $( "#status" ).addClass( "label label-danger" );
        $('#status').prop('title', 'Cancelado');
    }
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);
};