@extends('template.painel-recep')
@section('title', 'Inserir Conta')
@section('content')
<h6 class="mb-4"><i>NOVA CONTA</i></h6>
<hr>
<form method="POST" action="{{route('pagar.insert')}}" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="text" class="form-control" id="" name="descricao" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Valor</label>
                <input type="text" class="form-control" id="" name="valor">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Data Vencimento</label>
                <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" id="data" name="data">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label>Imagem ou PDF</label>
                <input type="file" class="form-control-file" id="imagem" name="imagem" onChange="carregarImg();">
            </div>


            <img src="{{ URL::asset('img/sem-foto2.jpg') }}" width="250" id="target">

        </div>

        <div class="col-md-3">
            <p align="right">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </p>
        </div>

    </div>



</form>


<!--SCRIPT PARA CARREGAR IMAGEM PRINCIPAL -->
<script type="text/javascript">

  function carregarImg() {

    var target = document.getElementById('target');
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
      target.src = reader.result;
    };

    if (file) {
      reader.readAsDataURL(file);


    } else {
      target.src = "";
    }
  }

</script>


@endsection