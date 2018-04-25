<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

    public function adiciona(){

        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        DB::table('produtos')->insert(
          ['nome' => $nome,
           'quantidade' => $quantidade,
           'valor' => $valor,
           'descricao' => $descricao
          ]
        );

        return view('produto.adicionado')->with('nome', $nome);
    }

    public function novo(){
        return view('produto.formulario');
    }

    public function mostra($id){

    $id = Request::route('id');

    $resposta = DB::select('select * from produtos where id = ?', [$id]);

    if(empty($resposta)){
      return "Esse produto não existe";
    }

    return view('produto.detalhes')->with( 'p', $resposta[0] );

    }

    public function lista(){

    $produtos = DB::select('select * from produtos');

    //return view('listagem')->with( 'produtos', $produtos );
    return view('produto/listagem')->withProdutos( $produtos );
    //return view('listagem', ['produtos' => $produtos]);

    //return view('listagem')->with('produtos', array());

    /*$data = ['produtos' => $produtos];
    return view('listagem', $data);*/

    /*$data = [];
    $data['produtos'] = $produtos;
    return view('listagem', $data);*/



    /*$html = '<h1>Listagem de produtos com Laravel</h1>';

    $html .= '<ul>';

    $produtos = DB::select('select * from produtos');

    foreach ($produtos as $p) {
      $html .= '<li> Nome: '. $p->nome .', Descrição: '. $p->descricao.'</li>';
    }

    $html .= '</ul>';

    return $html;*/
    }
}
