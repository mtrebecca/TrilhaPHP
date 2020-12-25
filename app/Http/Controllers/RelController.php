<?php

namespace App\Http\Controllers;

use App\Models\movimentacoe;
use Illuminate\Http\Request;

class RelController extends Controller
{
    public function movimentacoes(){
        $data_atual = date('Y-m-d');
        $tabela = movimentacoe::where('data', '>=', $data_atual)->where('data', '<=', $data_atual)->get();
        return view('painel-recepcao.rel.rel_mov', ['itens' => $tabela]);
    }
}
