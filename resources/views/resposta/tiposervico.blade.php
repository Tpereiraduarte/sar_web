@extends("theme.$theme.layout") 
@section('titulo') 
  Serviço 
@endsection 
@section('conteudo') 
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Serviço</h3>
            </div>
            <form role="form" action="{{ action('RespostaFormulariosController@servico') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="Servico">Ordem de serviço</label>
                        <select class="form-control" id="ordemservico_id" name="ordemservico_id" aria-required="true" required> 
                            <option selected disabled value="">Escolha a ordem de serviço</option>
                            @foreach($dados as $value)
                              <option value="{{$value->id_ordemservico}}">OS{{$value->numero_ordem_servico}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{URL::route('inicio')}}" title="Voltar" class="btn btn-primary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ url('js/toast.js') }}"></script>
@endpush
@endsection