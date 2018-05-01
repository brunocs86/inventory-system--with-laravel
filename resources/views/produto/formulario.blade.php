@extends('layouts.app')

@section('conteudo')
    <h2 align="center">Adicionar Novo Produto</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <ul>
                                <li><span class="fas fa-exclamation-triangle badge badge-danger pull-left">
                        {{ $error }}
                    </span></li>
                            </ul>
                        @endforeach
                    </div>
                @endif

                <form action="/produtos/adiciona" method="post">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-group">
                        <label>Nome</label>
                        <input name="nome" class="form-control" value="{{ old('nome') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Descrição</label>
                        <input name="descricao" class="form-control" value="{{ old('descricao') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Valor</label>
                        <input name="valor" class="form-control" value="{{ old('valor') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Quantidade</label>
                        <input name="quantidade" type="number" class="form-control" value="{{ old('quantidade') }}"/>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
                </form>

            </div>
        </div>
    </div>

@stop
