<?php

namespace estoque\Http\Controllers;

use estoque\Http\Requests\ProdutosRequest;
use estoque\Produto;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Request;


class ProdutoController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function adiciona(ProdutosRequest $request){

/*        $validator = Validator::make(
            [
                'nome' => Request::input('nome'),
                'descricao' => Request::input('descricao'),
                'valor' => Request::input('valor'),
                'quantidade' => Request::input('quantidade')
            ],
            [
                'nome' => 'required|min:5',
                'descricao' => 'required|max:255',
                'valor' => 'required|numeric',
                'quantidade' => 'required|numeric'
            ]);

        if($validator->fails())
        {
            return redirect()->action('ProdutoController@novo');
        }*/

        Produto::create($request->all());

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('quantidade', 'nome'));
    }

    public function listaJson(){
        $produtos = Produto::all();
        return respose()->json($produtos);
    }

    public function remove($id)
    {
        if(Auth::guest())
        {
            return('/login');
        }

        $produto = Produto::find($id);
        $produto->delete();

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('excluido'));
    }

    public function formalt($id){
        $produto = Produto::find($id);

        if(empty($produto)){
            return "Esse produto não existe";
        }

        return view('produto.formalt')->withP( $produto );

    }

    public function altera($id){

        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        DB::table('produtos')
            ->where('id', $id )
            ->update(
                ['nome' => $nome,
                 'descricao' => $descricao,
                 'valor' => $valor,
                 'quantidade' => $quantidade
                ]);

        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('valor', 'nome'));
    }
}
