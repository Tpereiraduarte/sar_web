@extends("theme.$theme.layout") 
@section('titulo') 
    Home 
@endsection 
@section('conteudo')
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>150</h3>
                <p>Novas Ordens de serviços</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-clipboard"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Checklists Respondidos</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-checkbox-outline"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>44</h3>
                <p>Checklists Pendentes</p>
            </div>
            <div class="icon">
                <i class="ion ion-alert"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <section class="col-lg-6 connectedSortable">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Gráfico de Pizza</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="chart-area"></canvas>
                </div>
            </div>
        </div>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de ordens de Serviços</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Serviço</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#">OR9842</a></td>
                                    <td>Instalar TV a cabo</td>
                                    <td><span class="label label-success">Enviado</span></td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR1848</a></td>
                                    <td>Reparo de ponto de telefone</td>
                                    <td><span class="label label-warning">Pendente</span></td>
                                </tr>

                                <tr>
                                    <td><a href="#">OR7429</a></td>
                                    <td>Instalar Fibra Ótica</td>
                                    <td><span class="label label-info">Pendente</span></td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR1848</a></td>
                                    <td>Reparo de Sinal de Internet </td>
                                    <td><span class="label label-warning">Pendente</span></td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR7429</a></td>
                                    <td>Instalação de TV a cabo</td>
                                    <td><span class="label label-danger">Entregue</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="box-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Nova Ordem</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="col-lg-6 connectedSortable">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Gráfico de Barras</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="chart-barras"></canvas>
                </div>
            </div>
        </div>
        </section>

        <section class="col-lg-6 connectedSortable">
        <div class="box box-solid bg-green-gradient">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Calendário</h3>
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <div id="calendar" style="width: 100%"></div>
            </div>
        </div>
    </section>

    <script>
        var pieData = [{
                value: 300,
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "Não Concluído"
            }, {
                value: 50,
                color: "#00a65a",
                highlight: "#0dca73",
                label: "Concluído"
            }, {
                value: 100,
                color: "#f39c12",
                highlight: "#FFC870",
                label: "Pendente"
            }
        ];

var barChartData = {
    labels : [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
    datasets : [
        {
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data : [1,2,80,100]
        }
    ]

}
            
        window.onload = function() {
            var contexto = document.getElementById("chart-barras").getContext("2d");
            window.myBar = new Chart(contexto).Bar(barChartData, {
                responsive : true
            });

            var ctx = document.getElementById("chart-area").getContext("2d");
            window.myPie = new Chart(ctx).Pie(pieData);
        };
    </script>
    @endsection