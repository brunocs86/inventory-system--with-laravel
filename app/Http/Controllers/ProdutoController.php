<?php

namespace estoque\Http\Controllers;

use estoque\Produto;
use Illuminate\Support\Facades\DB;
use Request;
//use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

    public function lista(){

        $produtos = Produto::all();

        return view('produto.listagem')->withProdutos( $produtos );

        //return view('listagem')->with( 'produtos', $produtos );
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

    public function mostra($id){

        $produto = Produto::find($id);

        if(empty($produto)){
          return "Esse produto não existe";
        }

        return view('produto.detalhes')->withP( $produto );

    }

    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(){

        Produto::create(Request::all());

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function listaJson(){
        $produtos = Produto::all();
        return respose()->json($produtos);
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->action('ProdutoController@lista');
    }

   /* public function altera($id){

        $produto = Produto::find($id);

        if(empty($produto)){
            return "Esse produto não existe";
        }

        return view('produto.altera')->withP( $produto );

    }*/
}
