@extends('template.painel-admin')
@section('title', 'Editar Produtos')
@section('content')
<h6 class="mb-4"><i>EDIÇÃO DE PRODUTOS</i></h6><hr>
<form method="POST" action="{{route('produto.editar', $item)}}">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputNome">Nome</label>
                    <input value="{{$item->nome}}" type="text" class="form-control" id="" name="nome" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPreco">Preço</label>
                    <input value="{{$item->preco}}" type="preco" class="form-control" id="" name="preco">
                </div>
            </div>


            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputDescricao">Descrição</label>
                    <input value="{{$item->descricao}}" type="text" class="form-control" id="descricao" name="descricao">
                </div>
            </div>
        </div>
       
    
        <p align="right">
        
        <input value="{{$item->preco}}" type="hidden"  name="oldpreco">
        <input value="{{$item->descricao}}" type="hidden"  name="olddescricao">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>
@endsection