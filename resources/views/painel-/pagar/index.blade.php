@extends('template.painel-recep')
@section('title', 'Contas à Pagar')
@section('content')
<?php

use App\Models\movimentacoe;
use App\Models\recepcionista;

@session_start();
if (@$_SESSION['nivel_usuario'] != 'recep') {
  echo "<script language='javascript'> window.location='./' </script>";
}
if (!isset($id)) {
  $id = "";
}

if (!isset($id2)) {
  $id2 = "";
}

?>


<?php
$total_saidas = 0;
//TOTALIZAR SAÍDAS
$data_atual = date('Y-m-d');
$tabela = movimentacoe::where('data', '>=', $data_atual)->where('data', '<=', $data_atual)->get();
foreach ($tabela as $tab) {
  if ($tab->tipo != 'Entrada') {
    $total_saidas = $total_saidas + $tab->valor;
  } 
}

$total_saidas = number_format($total_saidas, 2, ',', '.');
?>


<a href="{{route('pagar.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Conta</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-body">
    
      <div class="table-responsive table-sm">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>Descrição</th>
              <th>Valor</th>
              
              <th>Recepcionista</th>
              <th>Data Vencimento</th>
              <th>Ver Conta</th>
              <th>Ações</th>
            </tr>
          </thead>

          <tbody>
            @foreach($itens as $item)
            <?php
             $valor = number_format($item->valor, 2, ',', '.');
             $data = implode('/', array_reverse(explode('-', $item->data_venc)));
 
           
             $nome_recep = recepcionista::where('cpf', '=', $item->recep)->first();
             $nome_recep = @$nome_recep->nome;
            ?>
            <tr>
            <td><i class="fas fa-square mr-1 text-success <?php if($item->pago != 'Sim'){ ?> text-danger <?php } ?>"></i>{{$item->descricao}}</td>
            <td>R$ {{$valor}}</td>
              
              <td>{{@$nome_recep}}</td>
              
              <td>{{$data}}</td>
              <td><a href="{{ URL::asset('img/contas/' .$item->arquivo) }}" target="_blank"><?php if($item->arquivo != ''){ ?> <i class="fas fa-eye mr-1 text-info" ></i>Arquivo <?php } ?></a></td>
              <td>
              <?php if($item->pago != 'Sim'){ ?> 
                <a title="Baixar Pagamento" href="{{route('pagar.modal-baixa', $item)}}"><i class="fas fa-coins text-success mr-1"></i></a>
             
                <a title="Excluir Dados" href="{{route('pagar.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
              <?php } ?>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    
  </div>

  <div class="row ml-2 mb-4 mr-4">
    
    <div class="col-md-12" align="right">
      <span class="">Saídas do Dia: <span class="text-danger">R$ {{$total_saidas}}</span></span>
    </div>
  </div>

</div>





</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').dataTable({
      "ordering": false
    })

  });
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja Realmente Excluir este Registro?

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('pagar.delete', $id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Modal Cobrar -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Baixar Conta a Pagar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
        Deseja Realmente dar Baixa neste Pagamento?

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('pagar.baixa', $id2)}}">
          @csrf
          @method('put')
         
          <button type="submit" class="btn btn-success">Baixar</button>
        </form>
      </div>

    </div>
  </div>
</div>


<?php
if (@$id != "") {
  echo "<script>$('#exampleModal').modal('show');</script>";
}

if (@$id2 != "") {
  echo "<script>$('#exampleModal2').modal('show');</script>";
}
?>

@endsection