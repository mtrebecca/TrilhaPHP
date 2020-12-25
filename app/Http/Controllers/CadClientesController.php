<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\conta_receber;
use App\Models\usuario;
use Illuminate\Http\Request;

class CadClientesController extends Controller
{
    public function index(){
        $tabela = Clientes::orderby('id', 'desc')->paginate();
        return view('painel-admin.clientes.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.clientes.create');
    }


    public function insert(Request $request)
    {
        $tabela = new Clientes();
        $tabela->nome = $request->nome;
        $tabela->email = $request->email;
        $tabela->cpf = $request->cpf;
        $tabela->telefone = $request->telefone;
        $tabela->endereco = $request->endereco;
    

        $itens = Clientes::where('cpf', '=', $request->cpf)->orwhere('email', '=', $request->email)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Registro já Cadastrado!') </script>";
            return view('painel-admin.clientes.create');
            
            
        }

        $tabela->save();
        return redirect()->route('clientes.index');

    }


    public function edit(clientes $item){
        return view('painel-admin.clientes.edit', ['item' => $item]);   
     }
 
 
     public function editar(Request $request, clientes $item){
         
        $item->nome = $request->nome;
        $item->email = $request->email;
        $item->cpf = $request->cpf;
        $item->telefone = $request->telefone;
        $item->endereco = $request->endereco;

       

        $oldcpf = $request->oldcpf;
        $oldemail = $request->oldemail;

        if($oldcpf != $request->cpf){
            $itens = Clientes::where('cpf', '=', $request->cpf)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('CPF já Cadastrado!') </script>";
                return view('painel-admin.clientes.edit', ['item' => $item]);   
                
            }
        }



        if($oldemail != $request->email){
            $itens = Clientes::where('email', '=', $request->email)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Email já Cadastrado!') </script>";
                return view('painel-admin.clientes.edit', ['item' => $item]);   
                
            }
        }
       

        $item->save();
         return redirect()->route('clientes.index');
 
     }


     public function delete(clientes $item){
        $item->delete();
        return redirect()->route('clientes.index');
     }

     public function modal($id){
        $item = Clientes::orderby('id', 'desc')->paginate();
        return view('painel-admin.clientes.index', ['itens' => $item, 'id' => $id]);

     }


}
