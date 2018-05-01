@extends('layouts.app')
@section('conteudo')

    <h2 align="center">Detalhes do produto: {{$p->nome}} </h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <table class="table table-bordered table-hover">
                    <thead class="thead-light" align="center">
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    </thead>

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

            </div>
        </div>
    </div>

@stop
