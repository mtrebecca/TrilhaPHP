@extends('template.painel-admin')
@section('title', 'Editar Categoria')
@section('content')
<h6 class="mb-4"><i>EDIÇÃO DE CATEGORIAS</i></h6><hr>
<form method="POST" action="{{route('categorias.editar', $item)}}">
        @csrf
        @method('put')
        <div class="row">
           
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cliente</label>
                    <input value="{{$item->clientes}}" type="text" class="form-control" id="" name="produto" required>
                </div>
            </div>
           
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Produto</label>
                    <input value="{{$item->produto}}" type="text" class="form-control" id="" name="produto" required>
                </div>
            </div>

        <input value="{{$item->produto}}" type="hidden"  name="old">

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantidade</label>
                    <input value="{{$item->quantidade}}" type="text" class="form-control" id="" name="quantidade" required>
                </div>
            </div>

        <input value="{{$item->quantidade}}" type="hidden"  name="old">

        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Preço</label>
                    <input value="{{$item->preco}}" type="text" class="form-control" id="" name="preco" required>
                </div>
            </div>

            <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Total</label>
                    <input value="{{$item->total}}" type="text" class="form-control" id="" name="total" required>
                </div>
            </div>

        <input value="{{$item->produto}}" type="hidden"  name="old">

        <input value="{{$item->produto}}" type="hidden"  name="old">


        
        <button type="submit" class="btn btn-primary mt-4 mb-3">Salvar</button>
       
           
        </div>
       
    </form>
@endsection