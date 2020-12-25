<?php

namespace App\Http\Controllers;

use App\CadClientes;
use App\Models\Produto;
use App\Usuario;
use App\Models\Vendas;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function index(){
        $tabela = Vendas::orderby('id', 'desc')->paginate();
        return view('painel-admin.vendas.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.vendas.create');
    }


    public function insert(Request $request){
        
        $getVendas = Vendas::find($request->venda_id);

        $produto_id = $request->produto_id;
        $getProduto = Produto::find($produto_id);
        $quantidade = $request->quantidade;
        $preco = $request->preco;

        try {
            $vendas = Vendas::create([
                'quantidade' => $quantidade,
                'preco' => $preco,
                'vendas_id' => $getVendas->id,
                'produto_id' => $getProduto->id
            ]);
        }catch(Exception $e){
        
        $itens = Vendas::where('nome', '=', $request->nome)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Venda Realiazda!') </script>";
            return view('painel-admin.vendas.create');
        }
            
        }

      

        $tabela->save();
       
        return redirect()->route('vendas.index');

    }


    public function edit(vendas $item){
        return view('painel-admin.vendas.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, vendas $item){
         
        $item->nome = $request->nome;
         
        $old = $request->old;
       
       
        if($old != $request->nome){
            $itens = Vendas::where('nome', '=', $request->nome)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Venda já Cadastrada!') </script>";
                return view('painel-admin.vendas.edit', ['item' => $item]);   
                
            }
        }
       

        $item->save();
         return redirect()->route('vendas.index');
 
     }


     public function delete(vendas $item){
        $item->delete();
        return redirect()->route('vendas.index');
     }

     public function modal($id){
        $item = vendas::orderby('id', 'desc')->paginate();
        return view('painel-admin.vendas.index', ['itens' => $item, 'id' => $id]);

     }


}
