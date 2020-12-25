<?php

namespace App\Http\Controllers;

use App\Models\CadClientes;
use App\Models\conta_pagar;
use App\Models\conta_receber;
use App\Models\movimentacoe;
use Illuminate\Http\Request;

@session_start();
class PagarController extends Controller
{
    public function index()
    {
        $tabela = conta_pagar::orderby('id', 'desc')->paginate();
        return view('painel-recepcao.pagar.index', ['itens' => $tabela]);
    }



    public function create()
    {
        return view('painel-recepcao.pagar.create');
    }


    public function insert(Request $request)
    {

        //SCRIPT PARA SUBIR ARQUIVO NA PASTA
        $nome_img = preg_replace('/[ -]+/', '-', @$_FILES['imagem']['name']);
        $caminho = 'img/contas/' . $nome_img;
        if (@$_FILES['imagem']['name'] == "") {
            $imagem = "";
        } else {

            $imagem = $nome_img;
        }

        $imagem_temp = @$_FILES['imagem']['tmp_name'];

        $ext = pathinfo($imagem, PATHINFO_EXTENSION);
        

        $tabela = new conta_pagar();
        $valor = str_replace(',', '.', $request->valor);
        $tabela->descricao = $request->descricao;
        $tabela->valor = $valor;
        $tabela->recep = @$_SESSION['cpf_usuario'];
        $tabela->pago = 'Não';
        $tabela->data_venc = $request->data;
        $tabela->arquivo = $imagem;
        $tabela->data = date('Y-m-d');


        $tabela->save();

        if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'pdf' or $ext == '') {
            move_uploaded_file($imagem_temp, $caminho);
        } else {
            echo 'Extensão de Imagem não permitida!';
            exit();
        }

        return redirect()->route('pagar.index');
    }




    public function delete(conta_pagar $item)
    {
        $item->delete();
        return redirect()->route('pagar.index');
    }

    public function modal($id)
    {
        $item = conta_pagar::orderby('id', 'desc')->paginate();
        return view('painel-recepcao.pagar.index', ['itens' => $item, 'id' => $id]);
    }



    public function baixa(Request $request, conta_pagar $item)
    {

        $item->pago = 'Sim';
        $item->recep = @$_SESSION['cpf_usuario'];
        $item->data = date('Y-m-d');

        $tabela = new movimentacoe();
        $valor = str_replace(',', '.', $item->valor);
        $tabela->tipo = 'Saída';
        $tabela->descricao = $item->descricao;
        $tabela->recep = @$_SESSION['cpf_usuario'];
        $tabela->valor = $valor;
        $tabela->data = date('Y-m-d');

        $item->save();
        $tabela->save();
        return redirect()->route('pagar.index');

        
    }

    public function modal_baixa($id)
    {
        $item = conta_pagar::orderby('id', 'desc')->paginate();
        return view('painel-recepcao.pagar.index', ['itens' => $item, 'id2' => $id]);
    }
}
