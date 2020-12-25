<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\usuario;
use App\Models\Vendas;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        $tabela = Produto::orderby('id', 'desc')->paginate();
        return view('painel-admin.produto.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.produto.create');
    }


    public function insert(Request $request)
    {
        $tabela = new produto();
        $tabela->nome = $request->nome;
        $tabela->preco = $request->preco;
        $tabela->descricao = $request->descricao;
        
    
        $itens = Produto::where('preco', '=', $request->preco)->orwhere('nome', '=', $request->nome)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Produto já Cadastrado!') </script>";
            return view('painel-admin.produto.create');
            
            
        }

        $tabela->save();

        return redirect()->route('produto.index');

    }


    public function edit(produto $item, $id){
        return view('painel-admin.produto.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, produto $item, $id){

        $item->nome = $request->nome;
        $item->preco = $request->preco;
        $item->descricao = $request->descricao;
        
       

        $oldpreco = $request->oldpreco;
        $oldnome = $request->oldnome;
        

        if($oldpreco != $request->preco){
            $itens = Produto::where('preco', '=', $request->preco)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Preço já Cadastrado!') </script>";
                return view('painel-admin.produto.edit', ['item' => $item]);   
                
            }
        }

        if($oldnome != $request->nome){
            $itens = Produto::where('nome', '=', $request->nome)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Nome de produto já Cadastrado!') </script>";
                return view('painel-admin.produto.edit', ['item' => $item]);   
                
            }
        }

       
      
       

        $item->save();
         return redirect()->route('produto.index');
 
     }


     public function delete(produto $item){
        $item->delete();
        return redirect()->route('produto.index');
     }

     public function modal($id){
        $item = produto::orderby('id', 'desc')->paginate();
        return view('painel-admin.produto.index', ['itens' => $item, 'id' => $id]);

     }


}
