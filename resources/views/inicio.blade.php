@extends("theme.$theme.layout") 
@section('titulo') 
    Home 
@endsection 
@section('conteudo')
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 id="total"></h3>
                <p>Serviços cadastrados no sistema</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-clipboard"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3 id="respondido"></h3>
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
                <h3 id="pendente"></h3>
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
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de ordens de serviços realizados</h3>
                <div class="box-tools pull-right"></div>
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
                                @foreach($ordemrealizado as $valor)
                                <tr>
                                    <td>OR{{$valor->numero_ordem_servico}}</td>
                                    <td>Instalar TV a cabo</td>
                                    <td><span id="status" class="" title="">{{$valor->status}}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-6 connectedSortable">
        <div class="box box-solid bg-green-gradient">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Calendário</h3>
                <div class="pull-right box-tools"></div>
            </div>
            <div class="box-body no-padding">
                <div id="calendar" style="width: 100%"></div>
            </div>
        </div>
    </section>
    <section class="col-lg-6 connectedSortable">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de ordens de Serviços Pendentes</h3>
                <div class="box-tools pull-right"></div>
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
                                @foreach($ordempendente as $valor)
                                <tr>
                                    <td>OR{{$valor->numero_ordem_servico}}</td>
                                    <td>Instalar TV a cabo</td>
                                    <td><span class="label label-warning" title="Pendente">{{$valor->status}}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let dados = @json($quantidadeordemservico);
    </script>
    @push('scripts')
    <script src="{{ url('js/inicio.js') }}"></script>
    @endpush 
    @endsection