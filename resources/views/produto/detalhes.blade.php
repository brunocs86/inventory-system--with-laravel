@extends('layout.principal')
@section('conteudo')

    <h1>Detalhes do produto: {{$p->nome}} </h1>

    <table class="table table-bordered table-hover">

        <tr class="{{$p->quantidade <= 2 ? 'bg-danger' : ''}}">
          <td align="center" width="center"> R$ {{ $p->valor }}  </td>
          <td> {{ $p->descricao }} </td>
          <td align="center" width="center"> {{ $p->quantidade }} </td>
          {{--<td>
            <a href="/produtos/mostra/{{ $p->id }}">
              <span class="fas fa-search-plus"></span>
            </a>
          </td>--}}
          <td align="center" width="center">
            <a href="{{ action('ProdutoController@formalt', $p->id) }}">
              <span class="fas fa-pencil-alt"></span>
            </a>
          </td>
          <td align="center" width="center">
            <a href="{{ action('ProdutoController@remove', $p->id) }}">
              <span class="fas fa-trash-alt"></span>
            </a>
          </td>
        </tr>

    </table>

@stop
