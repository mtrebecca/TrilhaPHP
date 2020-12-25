@extends('template.painel-admin')
@section('title', 'Inserir Vendas')
@section('content')
<h6 class="mb-4"><i>CADASTRO DE VENDAS</i></h6><hr>
<form method="POST" action="{{route('vendas.insert')}}">
        @csrf

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Cliente</label>
                    <input type="text" class="form-control" id="" name="nome" required>
            </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputProduto">Produto</label>
                    <input type="text" class="form-control" id="" name="nome" required>
                </div>
            </div>
           
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPreco">Quantidade</label>
                    <input type="text" class="form-control" id="preco" name="preco">
                </div>
            </div>
        </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPreco">Preço</label>
                    <input type="text" class="form-control" id="cpf" name="preco">
                </div>
            </div>
        </div>
        </div>
        <p align="right">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>
@endsection