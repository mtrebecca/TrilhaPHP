@extends('template.painel-admin')
@section('title', 'Inserir Produtos')
@section('content')
<h6 class="mb-4"><i>CADASTRO DE PRODUTOS</i></h6><hr>
<form method="POST" action="{{route('produto.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputNome">Nome</label>
                    <input type="text" class="form-control" id="" name="nome" required>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPreco">Preço</label>
                    <input type="text" class="form-control" id="preco" name="preco">
                </div>
            </div>
        </div>

        <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPreco">Quantidade</label>
                    <input type="text" class="form-control" id="preco" name="preco">
                </div>
            </div>
        </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputDescricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>
            </div>
        </div>
        
    
        <p align="right">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>
@endsection