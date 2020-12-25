@extends('template.painel-admin')
@section('title', 'Produtos')
@section('content')
<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] != 'admin'){ 
  echo "<script language='javascript'> window.location='./' </script>";
}
if(!isset($id)){
  $id = ""; 
  
}

?>


<a href="{{route('produto.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Produtos</a>

<!-- DataTales Example -->
<div class="card shadow mb-4">

<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Descrição</th>
        </tr>
      </thead>

      <tbody>
      @foreach($itens as $item)
         <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nome}}</td>
            <td>{{$item->preco}}</td>
            <td>{{$item->descricao}}</td>
            
            <td>
            <a href="{{route('produto.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>
            <a href="{{route('produto.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
            </td>
        </tr>
        @endforeach 
      </tbody>
  </table>
</div>
</div>
</div>


   


</div>

<script type="text/javascript">
  $(document).ready(function () {
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
        <h5 class="modal-title" id="exampleModalLabel">Deletar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja Realmente Excluir esse Produto?
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('produto.delete', $id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>


<?php 
if(@$id != ""){
  echo "<script>$('#exampleModal').modal('show');</script>";
}
?>

@endsection


