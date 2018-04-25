@extends('layout.principal')

@section('conteudo')

@if(empty($produtos))
  <div><h1 align="center">Você não tem nenhum produto cadastrado. </h1></div>

@else
    <h1 align="center">Listagem de produtos</h1>
    <table class="table table-bordered table-hover">
    @foreach ($produtos as $p)
      <tr class="{{$p->quantidade <= 2 ? 'bg-danger' : ''}}">
        <td> {{ $p->nome }} </td>
        <td> {{ $p->valor }}  </td>
        <td> {{ $p->descricao }} </td>
        <td> {{ $p->quantidade }} </td>
        <td>
          <a href="/produtos/mostra/{{ $p->id }}">
            <span class="fas fa-search"></span>
          </a>
        </td>
      </tr>
    @endforeach
    </table>
    @endif

    <h4>
        <span class="badge badge-danger pull-right">
          Dois ou menos itens no estoque
        </span>
    </h4>

@if(old('nome'))
<br/>
<br/>
    <div class="alert alert-success">
        <strong>Sucesso!</strong> O produto {{ old('nome') }} foi adicionado.
    </div>
@endif

@stop
