@extends('layouts.app')

@section('conteudo')

    @if(empty($produtos))
        <div><h2 align="center">Você não tem nenhum produto cadastrado. </h2></div>

    @else
        <h2 align="center">Listagem de produtos</h2>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <table class="table table-bordered table-hover">
                        <thead class="thead-light" align="center">
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Detalhes</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                        </thead>

                        <tbody>
                            @foreach ($produtos as $p)
                                <tr class="{{ $p->quantidade <= 2 ? 'bg-danger' : ''}}">
                                    <td> {{ $p->nome }} </td>
                                    <td align="center" width="center"> {{ $p->valor }}  </td>
                                    <td> {{ $p->descricao }} </td>
                                    <td align="center" width="center"> {{ $p->quantidade }} </td>
                                    <td align="center" width="center">
                                        <a href="/produtos/mostra/{{ $p->id }}">
                                            <span class="fas fa-search-plus"></span>
                                        </a>
                                    </td>
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
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    @endif

    @foreach($produtos as $p)
        @if($p->quantidade < 3)
            <h4>
                <span class="badge badge-danger pull-right">
                  Dois ou menos itens no estoque
                </span>
                <br/>
            </h4>
            @break
        @endif
    @endforeach

    @if(old('quantidade'))
        <br/>
        <br/>
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{ old('nome') }} foi adicionado.
        </div>
    @endif

    @if(old('valor'))
        <br/>
        <br/>
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{ old('nome') }} foi alterado.
        </div>
    @endif

@stop
