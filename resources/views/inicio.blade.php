@extends("theme.$theme.layout") @section('titulo') Home @endsection @section('conteudo')
<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">

        <!-- BAR CHART -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Gráfico de Barras</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="barChart" style="height:230px"></canvas>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- /.nav-tabs-custom -->

        <!-- TABLE: LATEST ORDERS -->
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
                            <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Nova Ordem</a>

                        </div>
                    </div>

    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
        <!-- solid sales graph -->
        <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
                <i class="fa fa-th"></i>

                <h3 class="box-title">Gráfico de Ordens de Serviço</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body border-radius-none">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-border">
                <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">

                        <div class="knob-label">Aguardando Atendimento</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                        <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">

                        <div class="knob-label">Em Atendimento</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-xs-4 text-center">
                        <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
                        <div class="knob-label">Resolvidas</div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->

        <!-- Calendar -->
        <div class="box box-solid bg-green-gradient">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Calendário</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars"></i></button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Adicionar novo evento</a></li>
                            <li><a href="#">Limpar eventos</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Visualizar Calendário</a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
            </div>
    </section>
    </div>
    @endsection