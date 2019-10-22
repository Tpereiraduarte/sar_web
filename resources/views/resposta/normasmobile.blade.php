@extends("theme.$theme.layout") 
@section('titulo') 
  Normas 
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
                <h3 class="box-title">Normas</h3>
            </div>
            <form role="form" action="{{ action('RespostaFormulariosController@relatoriomobile') }}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="Servico">Normas</label>
                        <select class="form-control" name="id_norma" aria-required="true" required> 
                            <option selected disabled value="">Escolha uma norma</option>
                            @foreach($dados as $value)
                              <option value="{{$value->id_norma}}">{{$value->numero_norma}}</option>
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